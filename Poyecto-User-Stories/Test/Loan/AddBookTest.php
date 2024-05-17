<?php


namespace Practicas2024\BookLoanSystem\Loan;

require_once 'src/Book/BookRepositoryInterface.php';
require_once 'src/Book/YourBookRepository.php';
require_once 'src/Auth/UserStories.php';
require_once 'src/Loan/LoanRepositoryInterface.php';

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

    public function testShouldFailToAddBookWithoutTitle()
    {
        $newBook = [
                'id' => 5,
                'title' => '',
                'author' => 'Anonymous',
                'publisher' => 'Unknown'
        ];

        $this->bookRepositoryMock->expects($this->once())
                ->method('addBook')
                ->with($newBook)
                ->willReturn(false);

        $result = $this->userStories->addBook($newBook);
        $this->assertFalse($result);
    }
}