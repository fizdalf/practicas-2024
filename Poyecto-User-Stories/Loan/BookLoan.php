<?php

namespace Practicas2024\BookLoanSystem\Loan;

class BookLoan
{
    private string $status;
    public function __construct($a, $b, $c, $d,string $status)
    {
        $this->status = $status;
    }

    public function status(): string
    {
        return  $this->status;
    }

    public function markAsReturned()
    {
        $this->status = 'RETURNED';
    }
}