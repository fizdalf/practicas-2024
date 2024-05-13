º    <?php
//User Stories:
//Como usuario, quiero poder registrarme en la aplicación para que pueda acceder a los servicios.
//Como usuario, quiero poder acceder con mis credenciales para que pueda utilizar la aplicación.
//Como usuario, quiero ver una lista de libros disponibles para que pueda elegir un libro para pedir prestado.
//Como usuario, quiero poder buscar un libro por su título, autor, o editorial para que pueda encontrarlo fácilmente.
//Como usuario, quiero poder solicitar un libro en préstamo para leerlo.
//Como usuario, quiero poder ver la lista de libros que tengo en préstamo.
//Como usuario, quiero poder marcar un libro para devolver.
//Como administrador, quiero poder agregar nuevos libros al sistema para que los usuarios puedan pedirlos prestados.
//Como administrador, quiero poder ver todas las solicitudes de préstamo para que pueda aprobarlas o rechazarlas.
//Como administrador, quiero poder ver todas las solicitudes de devolución para que pueda aprobarlas o rechazarlas.

require __DIR__ . '/userStories.php';
require __DIR__.'/Loan/PendingToReturnBookLoanFinder.php';
require __DIR__.'/Loan/LoanRepository.php';
require __DIR__.'/Loan/BookReturnProcessor.php';
require __DIR__.'/Loan/BookLoan.php';

use PHPUnit\Framework\TestCase;
use Practicas2024\BookLoanSystem\Loan\BookLoan;
use Practicas2024\BookLoanSystem\Loan\BookReturnProcessor;
use Practicas2024\BookLoanSystem\Loan\LoanRepository;
use Practicas2024\BookLoanSystem\Loan\PendingToReturnBookLoanFinder;

class UserStoriesTest extends TestCase
{
    protected $userStories;
    private $loanRepository;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $this->loanRepository = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $this->loanRepository);
    }

    public function testShouldReturnAnEasyRegister()
    {
        $this->assertEquals("registrado", $this->userStories->userRegister());
    }

    public function testShouldReturnAEasyLogin()
    {
        $this->assertEquals("Credenciales Correctas", $this->userStories->userLogin("usuario@gmail.com", "1234"));
        $this->assertEquals("Credenciales Incorrectas", $this->userStories->userLogin("usuarios@gmail.com", "12345"));
    }


    public function testShouldReturnFalseForBookLoan()
    {
        $loans = array(
                array('book_id' => 1, 'returned' => false),
                array('book_id' => 2, 'returned' => true),
                array('book_id' => 3, 'returned' => false)
        );

        $result1 = $this->userStories->isBookOnLoan(1, $loans);
        $result2 = $this->userStories->isBookOnLoan(2, $loans);

        $this->assertTrue($result1);
        $this->assertFalse($result2);
    }

    public function searchBooks()
    {
        $books = array(
                array('id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana'),
                array('id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta'),
                array('id' => 3, 'title' => 'El código Da Vinci', 'author' => 'Dan Brown', 'publisher' => 'Editorial Norma')
        );

        $this->userStories->expects($this->once())
                ->method("get books")
                ->willReturn($books);

        $searchResult = $this->userStories->SearchBooks("Cervantes");
        $expectedResult = array(
                array('id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta')
        );
        $this->assertEquals($expectedResult, $searchResult);
    }

    public function testShouldReturnAMarkedBook()
    {
        //Encontrar un prestamo de libro pendiente de devolver para el libro con id 1
        //Marcar el préstamo como devuelto
        //Guardar el préstamo modificado

        $pendingToReturnBookLoanFinder = $this->createMock(PendingToReturnBookLoanFinder::class);
        $loanRepository = $this->createMock(LoanRepository::class);
        $bookReturnProcessor = new BookReturnProcessor(
                $pendingToReturnBookLoanFinder,
                $loanRepository
        );

        $bookId = 1;

        $bookLoan = new BookLoan(
                1,
                $bookId,
                1,
                new DateTimeImmutable('2021-01-01 10:35:00'),
                "PENDING"
        );

        $pendingToReturnBookLoanFinder
                ->expects($this->once())
                ->method('__invoke')
                ->with($bookId)
                ->willReturn($bookLoan);

        $loanRepository
                ->expects($this->once())
            ->method('save')
            ->willReturnCallback(
                    function(BookLoan $savedBookLoan) use ($bookLoan) {

                        if($bookLoan !== $savedBookLoan ){
                            throw new Exception('Book loan are not the same');
                        }

                        if($savedBookLoan->status() !== 'RETURNED'){
                            throw new Exception('Book loan is not returned!');
                        }
                    }

            );


        $bookReturnProcessor->__invoke($bookId);

    }

    public function testShouldReturnAFailMarkWhenTheBookDoesNotExist()
    {
        $bookId = 4;
        $loans = [
                ['book_id' => 1, 'returned' => false],
                ['book_id' => 2, 'returned' => true],
                ['book_id' => 3, 'returned' => false]
        ];

        $this->expects($this->once())
                ->method('getLoans')
                ->willReturn($loans);

        $result = $this->userStories->markBookForReturn($bookId);

        $this->assertFalse($result);

        $updatedLoans = $this->userStories->getLoans();
        $this->assertEquals($loans, $updatedLoans);
    }

    public function testShouldReturnAFailWhenTryToReturnAReturnedBook()
    {
        $bookId = 2;
        $loans = [
                ['book_id' => 1, 'returned' => false],
                ['book_id' => 2, 'returned' => true],
                ['book_id' => 3, 'returned' => false]
        ];

        $this->expects($this->once())
                ->method('getLoans')
                ->willReturn($loans);

        $result = $this->userStories->markBookForReturn($bookId);

        $this->assertFalse($result);

        $updatedLoans = $this->getLoans();
        $this->assertEquals($loans, $updatedLoans);
    }
}