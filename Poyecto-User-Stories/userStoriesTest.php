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
    public function testShouldReturnAEasyLogin()
    {
        $registration = new UserRegister;
        $result = $registration->resgisterUser("neyder@gmail.com", "neyder123");
        $this->assertTrue($result, userStories::userRegister());

    }
}