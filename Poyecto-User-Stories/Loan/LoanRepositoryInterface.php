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

    public function isBookOnLoan($bookId, $loans){
    foreach ($loans as $loan){
        if ($loan["book_id"] == $bookId && !$loan["returned"]){
            return true;
        }
    }
    return false;
    }

    public function searchBooks($keyword)
    {
        $books = $this->bookRepository->getBooks();
        $foundBooks = array();
        foreach ($books as $book){
            if(stripos($book["title"], $keyword) !== false ||
                    stripos($book["author"], $keyword) !== false ||
                    stripos($book["publisher"], $keyword) !== false){
                $foundBooks[] = $book;
            }
        }
        return $foundBooks;
    }

    public function markBookForReturn($bookId)
    {
        $loans = $this->loanRepository->getLoans();

        foreach ($loans as &$loan) {
            if ($loan['book_id'] == $bookId && !$loan['returned']) {
                $loan['returned'] = true;
            }
        }

        return true;
    }
}