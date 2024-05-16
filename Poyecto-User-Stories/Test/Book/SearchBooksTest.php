<?php

use PHP\Framework\TestCase;

class SearchBooksTest extends TestCase
{
    protected $userStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testSearchByTitle()
    {
        $books = [
                ['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana'],
                ['id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta'],
                ['id' => 3, 'title' => 'El código Da Vinci', 'author' => 'Dan Brown', 'publisher' => 'Editorial Norma']
        ];

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock->method('getBooks')->willReturn($books);

        $this->userStories = new UserStories($bookRepositoryMock, $this->loanRepositoryMock);

        $searchResult = $this->userStories->searchBooks("Cien años de soledad");

        $expectedResult = [['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana']];
        $this->assertEquals($expectedResult, $searchResult);
    }

    public function testSearchByAuthor()
    {
        $books = [
                ['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana'],
                ['id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta'],
                ['id' => 3, 'title' => 'El código Da Vinci', 'author' => 'Dan Brown', 'publisher' => 'Editorial Norma']
        ];

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock->method('getBooks')->willReturn($books);

        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);

        $searchResult = $this->userStories->searchBooks("Gabriel García Márquez");

        $expectedResult = [['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana']];
        $this->assertEquals($expectedResult, $searchResult);
    }

    public function testSearchByAuthor()
    {
        // Preparar datos de prueba (libros)
        $books = [
                ['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana'],
                ['id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta'],
                ['id' => 3, 'title' => 'El código Da Vinci', 'author' => 'Dan Brown', 'publisher' => 'Editorial Norma']
        ];

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock->method('getBooks')->willReturn($books);

        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);

        $searchResult = $this->userStories->searchBooks("Gabriel García Márquez");

        $expectedResult = [['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana']];
        $this->assertEquals($expectedResult, $searchResult);
    }

    public function testSearchByPublisher()
    {
        $books = [
                ['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana'],
                ['id' => 2, 'title' => 'Don Quijote de la Mancha', 'author' => 'Miguel de Cervantes', 'publisher' => 'Editorial Planeta'],
                ['id' => 3, 'title' => 'El código Da Vinci', 'author' => 'Dan Brown', 'publisher' => 'Editorial Norma']
        ];

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock->method('getBooks')->willReturn($books);

        $this->userStories = new UserStories($bookRepositoryMock, $loanRepositoryMock);

        $searchResult = $this->userStories->searchBooks("Editorial Sudamericana");

        $expectedResult = [['id' => 1, 'title' => 'Cien años de soledad', 'author' => 'Gabriel García Márquez', 'publisher' => 'Editorial Sudamericana']];
        $this->assertEquals($expectedResult, $searchResult);
    }
}