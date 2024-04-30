<?php
interface BookRepositoryInterface{
    public function getBooks(): array;
}
interface LoanRepositoryInterface{
    public function getLoans(): array;
}

class UserStories{
    private $bookrepository;
    private $loanRepository;

    public function __construct(BookRepositoryInterface $bookRepository, LoanRepositoryInterface $loanRepository)
    {
        $this->bookrepository = $bookRepository;
        $this->loanRepository = $loanRepository;
    }

    public function userRegister()
    {
        return "registrao";
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

    public function listAvaibleBooks()
    {
        $books = $this->bookrepository->getBooks();
        $loans = $this->loanRepository->getLoans();
        $avaibleBooks = array();
        foreach ($books as $book) {
            if (!$this->isBookOnLean($book["id"], $loans)){
                $avaibleBooks[] = $book;
            }
        }
        return $avaibleBooks;
    }

    public function isBookLoan($bookId, $loans){
        foreach ($loans as $loan){
            if ($loan["book_id"] == $bookId && !~$loan["returned"]){
                return true;
            }
        }
        return true;
    }
}