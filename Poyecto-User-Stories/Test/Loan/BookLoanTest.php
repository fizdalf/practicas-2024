<?php

namespace Practicas2024\BookLoanSystem\Loan;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

require __DIR__.'/../../Loan/BookLoan.php';

class BookLoanTest extends TestCase
{
    function testShouldReturnStatusInBookLoan(){
        $bookLoan = new BookLoan(
                1,
                1,
                1,
                new DateTimeImmutable('2021-01-01 10:35:00'),
                "PENDING"
        );

        $this->assertEquals('PENDING', $bookLoan->status());

    }

    function testShouldSetStatusToReturnedWhenMarkAsReturned(){
        $bookLoan = new BookLoan(
                1,
                1,
                1,
                new DateTimeImmutable('2021-01-01 10:35:00'),
                "PENDING"
        );

        $bookLoan->markAsReturned();

        $this->assertEquals('RETURNED', $bookLoan->status());
    }
}