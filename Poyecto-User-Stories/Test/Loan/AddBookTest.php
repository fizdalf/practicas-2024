<?php

namespace Practicas2024\BookLoanSystem\Loan;
use PHPUnit\Framework\TestCase;

class AddBookTest extends TestCase
{
    protected $userStories;
    protected $bookRepositoryMock;

    protected function setUp(): void
    {
        $this->bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($this->bookRepositoryMock, $loanRepositoryMock);
    }
}