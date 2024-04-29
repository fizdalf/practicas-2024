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

class userStoriesTest extends TestCase
{
    protected $userStories;

    public function testShouldReturnAnEasyRegister()
    {
        $this->assertEquals(userStories::userRegister());
    }
    public function testShouldReturnAEasyLogin()
    {
        $this->assertEquals("Credenciales Correctas",
                userStories::userLogin("usuario@gmail.com", "1234"));
    }
    public function testShouldReturnAEasyLogin1()
    {
        $this->assertEquals("Credenciales Incorrectas",
                userStories::userLogin("usuarios@gmail.com", "12345"));
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


        $availableBooks = userStories::listAvailableBooks($books, $loans);
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

        $result1 = userStories::isBookOnLoan(1, $loans);
        $result2 = userStories::isBookOnLoan(2, $loans);

        $this->assertTrue($result1);
        $this->assertFalse($result2);
    }

}