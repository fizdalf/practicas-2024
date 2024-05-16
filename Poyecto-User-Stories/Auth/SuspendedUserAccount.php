<?php

class SuspendedUserAccount extends TestCase
{
    protected $adminStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $this->adminStories = new AdminStories($bookRepositoryMock, $loanRepositoryMock, $userRepositoryMock);
    }

    public function testSuspendUserAccount()
    {
        $userId = 1;

        $userRepositoryMock = $this->createMock(UserRepositoryInterface::class);
        $userRepositoryMock->method('suspendUserAccount')->with($userId)->willReturn(true);

        $this->adminStories = new AdminStories(
                $this->createMock(BookRepositoryInterface::class),
                $this->createMock(LoanRepositoryInterface::class),
                $userRepositoryMock
        );

        ob_start();
        $this->adminStories->suspendUserAccountTest();
        $output = ob_get_clean();

        $this->assertEquals("La cuenta del usuario ha sido suspendida exitosamente. \n", $output);
    }
}