<?php

namespace Practicas2024\BookLoanSystem\Loan;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

require __DIR__.'/../../Loan/PendingToReturnBookLoanFinder.php';
require __DIR__.'/../../Loan/LoanRepository.php';
require __DIR__.'/../../Loan/BookReturnProcessor.php';
require __DIR__.'/../../Loan/BookLoan.php';


class BookReturnProcessorTest extends TestCase
{
    public function testShouldFindPendingToReturnBookLoanAndMarkItAsReturnedAndSaveIt()
    {
        //Encontrar un prestamo de libro pendiente de devolver para el libro con id 1
        //Marcar el préstamo como devuelto
        //Guardar el préstamo modificado

        $pendingToReturnBookLoanFinder = $this->createMock(PendingToReturnBookLoanFinder::class);
        $loanRepository = $this->createMock(LoanRepository::class);
        $bookReturnProcessor = new BookReturnProcessor(
                $pendingToReturnBookLoanFinder,
                $loanRepository
        );

        $bookId = 1;

        $bookLoan = new BookLoan(
                1,
                $bookId,
                1,
                new DateTimeImmutable('2021-01-01 10:35:00'),
                "PENDING"
        );

        $pendingToReturnBookLoanFinder
                ->expects($this->once())
                ->method('__invoke')
                ->with($bookId)
                ->willReturn($bookLoan);

        $loanRepository
                ->expects($this->once())
                ->method('save')
                ->willReturnCallback(
                        function(BookLoan $savedBookLoan) use ($bookLoan) {

                            if($bookLoan !== $savedBookLoan ){
                                throw new Exception('Book loan are not the same');
                            }

                            if($savedBookLoan->status() !== 'RETURNED'){
                                throw new Exception('Book loan is not returned!');
                            }
                        }

                );


        $bookReturnProcessor->__invoke($bookId);
    }

    public function testShouldThrowBookNotLoanedExceptionWhenBookNotLoaned()
    {
        $bookId = 1;
        $pendingToReturnBookLoanFinder = $this->createMock(PendingToReturnBookLoanFinder::class);
        $pendingToReturnBookLoanFinder
                ->expects($this->once())
                ->method('__invoke')
                ->with($bookId)
                ->willThrowException(new BookNotLoanedException());

        $this->expectExceptionObject(new BookNotLoanedException());

        $bookReturnProcessor->__invoke($bookId);
    }   
}