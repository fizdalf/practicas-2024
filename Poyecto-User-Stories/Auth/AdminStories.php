<?php

interface BookRepositoryInterface{
    public function getBooks(): array;
}
interface LoanRepositoryInterface{
    public function getLoans(): array;
}

class AdminStories{
    private $bookRepository;
    private $loanRepository;

    public function __construct(BookRepositoryInterface $bookRepository, LoanRepositoryInterface $loanRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->loanRepository = $loanRepository;
    }
}

