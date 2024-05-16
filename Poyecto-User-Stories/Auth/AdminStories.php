<?php

require_once 'src/Loan/BookLoan.php';
require_once 'src/Loan/BookReturnProcessor.php';
require_once 'src/Loan/BookLoanPendingToReturnBookLoanFinder.php';
require_once 'src/Login-Register/Login.php';
require_once 'src/Book/AddNewBook.php';
require_once 'src/Book/DeleteBookTest.php';


class AdminStories
{
    private $bookRepository;
    private $loanRepository;
    private $userRepository;

    public function __construct(BookRepositoryInterface $bookRepository, LoanRepositoryInterface $loanRepository, UserRepositoryInterface $userRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->loanRepository = $loanRepository;
        $this->userRepository = $userRepository;

    }

}