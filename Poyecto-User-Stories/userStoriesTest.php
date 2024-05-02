    <?php
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

require __DIR__.'/userStories.php';

use PHPUnit\Framework\TestCase;

    class UserStoriesTest extends TestCase
    {
        protected $userStories;

        public function setUp(): void
        {
            $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
            $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
            $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);
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

        public function testShouldReturnAvailableBooks()
        {
            $books = array(
                    array('id' => 1, 'title' => 'Cien años de soledad'),
                    array('id' => 2, 'title' => 'Don Quijote de la Mancha'),
                    array('id' => 3, 'title' => 'El código Da Vinci')
            );

            $loans = array(
                    array('book_id' => 1, 'returned' => false),
                    array('book_id' => 2, 'returned' => true),
                    array('book_id' => 3, 'returned' => false)
            );

            $this->userStories->listAvailableBooks();

            $availableBooks = $this->userStories->listAvailableBooks();

            $expectedResult = array(
                    array('id' => 2, 'title' => 'Don Quijote de la Mancha'),
            );

            $this->assertEquals($expectedResult, $availableBooks);
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
        public function searchBooks(){
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
    }