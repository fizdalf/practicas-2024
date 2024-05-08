<?php

//Separar en archivos distintos = Archivo por metodo.

interface BookRepositoryInterface{
    public function getBooks(): array;
}
interface LoanRepositoryInterface{
    public function getLoans(): array;
}

class UserStories{
    private $bookRepository;
    private $loanRepository;

    public function __construct(BookRepositoryInterface $bookRepository, LoanRepositoryInterface $loanRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->loanRepository = $loanRepository;
    }
    public function userRegister()
    {
        return "registrado";
    }

    public function userLogin($email, $password)
    {
        $emailCorrecto = "usuario@gmail.com";
        $passwordCorrecto = "1234";

        if ($email === $emailCorrecto && $password === $passwordCorrecto) {
            return "Credenciales Correctas";
        } else {
            return "Credenciales Incorrectas";
        }
    }

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

//Hacer el admin



}


