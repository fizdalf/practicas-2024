<?php

require_once 'src/Book/BookRepositoryInterface.php';
require_once 'src/Book/YourBookRepository.php';
require_once 'src/Loan/LoanRepository.php';
require_once 'src/Loan/YourLoanRepository.php';

class UserStories {
    private $bookRepository;
    private $loanRepository;

    public function __construct(BookRepositoryInterface $bookRepository, LoanRepositoryInterface $loanRepository) {
        $this->bookRepository = $bookRepository;
        $this->loanRepository = $loanRepository;
    }
}
