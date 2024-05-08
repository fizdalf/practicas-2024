<?php

class LoanBook{
    public function listAvailableBooks()
    {
        $books = $this->bookRepository->getBooks();
        $loans = $this->loanRepository->getLoans();
        $availableBooks = array();
        foreach ($books as $book) {
            if (!$this->isBookOnLoan($book["id"], $loans)){
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }
}