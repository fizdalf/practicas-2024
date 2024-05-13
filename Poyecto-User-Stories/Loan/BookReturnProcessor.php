<?php

namespace  Practicas2024\BookLoanSystem\Loan;

class BookReturnProcessor
{

    private PendingToReturnBookLoanFinder $finder;

    public function __construct(PendingToReturnBookLoanFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(int $bookId)
    {
        $this->finder->__invoke($bookId);
    }
}