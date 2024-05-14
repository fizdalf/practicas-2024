<?php

namespace Practicas2024\BookLoanSystem\Loan;

interface PendingToReturnBookLoanFinder
{
    /** @throws BookNotLoanedException */
    public function __invoke(int $bookId): BookLoan;
}