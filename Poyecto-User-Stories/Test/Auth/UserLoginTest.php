<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Auth/UserStories.php';

class UserLoginTest extends TestCase
{
    protected $userStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testShouldReturnCorrectCredentials()
    {
        $this->assertEquals("Credenciales Correctas", $this->userStories->userLogin("usuario@gmail.com", "1234"));
    }

    public function testShouldReturnIncorrectCredentials()
    {
        $this->assertEquals("Credenciales Incorrectas", $this->userStories->userLogin("usuarios@gmail.com", "12345"));
    }

}
