<?php

namespace  Practicas2024\BookLoanSystem\Loan;

interface LoanRepositoryInterface
{
    public function getLoan(): array;

    public function save(BookLoan $loan): void;

    public function updateLoan($loan): void;
}
