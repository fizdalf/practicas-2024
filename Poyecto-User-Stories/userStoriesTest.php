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
//FAlta este
//Como administrador, quiero poder ver todas las solicitudes de devolución para que pueda aprobarlas o rechazarlas.

require_once __DIR__ . '/userStories.php';
require_once __DIR__ . '/vendor/autoload.php';


use PHPUnit\Framework\TestCase;

class UserStoriesTest extends TestCase
{
    protected $userStories;
    private $loanRepositoryMock;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $this->loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $this->loanRepositoryMock);
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




    public function testShouldReturnAFailWhenTryToReturnAReturnedBook()
    {
        $bookId = 2;
        $loans = [
                ['book_id' => 1, 'returned' => false],
                ['book_id' => 2, 'returned' => true],
                ['book_id' => 3, 'returned' => false]
        ];

        $this->loanRepositoryMock->expects($this->once())
                ->method('getLoans')
                ->willReturn($loans);

        $result = $this->userStories->markBookForReturn($bookId);

        $this->assertFalse($result);

        $this->assertEquals($loans, $loans);
    }

    public function testShouldAddBookSuccessfully()
    {
        $newBook = [
                'id' => 4,
                'title' => '1984',
                'author' => 'George Orwell',
                'publisher' => 'Secker & Warburg'
        ];

        $this->bookRepositoryMock->expects($this->once())
                ->method('addBook')
                ->with($newBook)
                ->willReturn(true);

        $result = $this->userStories->addBook($newBook);
        $this->assertTrue($result);
    }

    public function testViewReturnRequests()
    {
        $loans = [
                ['loan_id' => 1, 'book_id' => 1, 'returned' => true, 'approved' => false],
                ['loan_id' => 2, 'book_id' => 2, 'returned' => true, 'approved' => true],
                ['loan_id' => 3, 'book_id' => 3, 'returned' => false, 'approved' => false]
        ];
        $this->loanRepository->method("getLoans")->willReturn($loans);

        $result = this->userStories->viewReturnRequests();
        $expectedResult = [
                ['loan_id' => 1, 'book_id' => 1, 'returned' => true, 'approved' => false]
        ];

        $this->assertEquals($expectedResult, $result);
    }
    public function processReturnRequest($loanId, $approved) {
        $loans = $this->loanRepository->getLoans();
        foreach ($loans as &$loan) {
            if ($loan['loan_id'] == $loanId) {
                $loan['approved'] = $approved;
                return true;
            }
        }
        return false;
    }
}