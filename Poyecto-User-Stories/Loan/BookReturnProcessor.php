<?php

namespace  Practicas2024\BookLoanSystem\Loan;

class BookReturnProcessor
{

    private PendingToReturnBookLoanFinder $finder;
    private LoanRepositoryInterface $repository;

    public function __construct(PendingToReturnBookLoanFinder $finder, LoanRepositoryInterface $repository)
    {
        $this->finder = $finder;
        $this->repository = $repository;
    }

    public function __invoke(int $bookId)
    {
        $bookLoan = $this->finder->__invoke($bookId);

        $bookLoan->markAsReturned();

        $this->repository->save($bookLoan);
    }
}