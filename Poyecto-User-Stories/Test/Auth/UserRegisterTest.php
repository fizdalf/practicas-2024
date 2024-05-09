<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Auth/UserStories.php';

class UserRegisterTest extends TestCase
{
    protected $userStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testShouldReturnRegistered()
    {
        $this->assertEquals("registrado", $this->userStories->userRegister());
    }

    // Otros métodos de prueba relacionados con el registro de usuarios
}
