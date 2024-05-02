<?php
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

}


// Interfaz para los colaboradores
interface Authenticator
{
    public function findUserByEmail($email);

    public function verifyPassword($user, $password);

    public function initiateSession($user);
}

// Colaborador: Autenticador de Base de Datos
class DatabaseAuthenticator implements Authenticator
{
    public function findUserByEmail($email)
    {
        // Lógica para buscar usuario en la base de datos
    }

    public function verifyPassword($user, $password)
    {
        // Lógica para verificar contraseña en la base de datos
    }

    public function initiateSession($user)
    {
        // Lógica para iniciar sesión y establecer cookies, etc.
    }
}

// Colaborador: Autenticador de Archivos
class FileAuthenticator implements Authenticator
{
    public function findUserByEmail($email)
    {
        // Lógica para buscar usuario en archivos
    }

    public function verifyPassword($user, $password)
    {
        // Lógica para verificar contraseña en archivos
    }

    public function initiateSession($user)
    {
        // Lógica para iniciar sesión y guardar información en archivos
    }
}

// Capataz
class LoginManager
{
    private $authenticator;

    public function __construct(Authenticator $authenticator)
    {
        $this->authenticator = $authenticator;
    }

    public function login($email, $password)
    {
        $user = $this->authenticator->findUserByEmail($email);
        if ($user && $this->authenticator->verifyPassword($user, $password)) {
            $this->authenticator->initiateSession($user);
            return true;
        } else {
            throw new Exception("Credenciales inválidas");
        }
    }
}

// Uso del sistema
$databaseAuthenticator = new DatabaseAuthenticator();
$fileAuthenticator = new FileAuthenticator();

$loginManager = new LoginManager($databaseAuthenticator);
// O bien
// $loginManager = new LoginManager($fileAuthenticator);

try {
    $loginManager->login("usuario@example.com", "contraseña");
    echo "Inicio de sesión exitoso";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


