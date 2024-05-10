<?php

use PHPUnit\Framework\TestCase;

require_once 'src/Auth/UserStories.php';

class MarkBookForReturnTest extends TestCase
{
    protected $userStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testShouldReturnAMarkedBook()
    {
        $bookId = 1;
        $returnedBy = 'John Doe';
        $returnDate = '2024-05-20';

        $loans = [
                ['book_id' => 1, 'returned' => false],
                ['book_id' => 2, 'returned' => true],
                ['book_id' => 3, 'returned' => false]
        ];

        $this->userStories->expects($this->once())
                ->method('getLoans')
                ->willReturn($loans);

        $result = $this->userStories->markBookForReturn($bookId, $returnedBy, $returnDate);

        $this->assertTrue($result);

        $updatedLoans = $this->userStories->getLoans();
        $this->assertTrue($updatedLoans[$bookId - 1]['returned']);
        $this->assertEquals($returnedBy, $updatedLoans[$bookId - 1]['returned_by']);
        $this->assertEquals($returnDate, $updatedLoans[$bookId - 1]['return_date']);
    }

}
