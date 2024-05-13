<?php

namespace  Practicas2024\BookLoanSystem\Loan;

class BookReturnProcessor
{

    private PendingToReturnBookLoanFinder $finder;
    private LoanRepository $repository;

    public function __construct(PendingToReturnBookLoanFinder $finder, LoanRepository $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function __invoke(int $bookId)
    {
        $bookLoan = $this->finder->__invoke($bookId);

        $this->repository->save($bookLoan);
    }
}