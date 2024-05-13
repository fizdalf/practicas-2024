<?php

namespace Practicas2024\BookLoanSystem\Loan;

interface PendingToReturnBookLoanFinder
{
    public function __invoke(int $bookId): BookLoan;
}