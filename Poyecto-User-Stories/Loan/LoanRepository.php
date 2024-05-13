<?php

namespace  Practicas2024\BookLoanSystem\Loan;

interface LoanRepository
{
    public function getLoan(): array;

    public function save(BookLoan $loan): void;
}
