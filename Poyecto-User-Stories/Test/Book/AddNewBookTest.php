<?php

class AddNewBookTest extends TestCase
{
    protected $adminStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->adminStories = new AdminStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testAddNewBook()
    {
        $newBookData = [
                'title' => 'Nuevo Libro',
                'author' => 'Autor Ejemplo',
                'isbn' => '1234567890',
                'publishedYear' => 2024,
                'genre' => 'Ficción'
        ];

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock->method('addNewBook')->with($newBookData)->willReturn(true);

        $this->adminStories = new AdminStories($bookRepositoryMock, $this->createMock(LoanRepositoryInterface::class));

        ob_start();
        $this->adminStories->addNewBookTest();
        $output = ob_get_clean();

        $this->assertEquals("El libro ha sido agregado exitosamente.\n", $output);
    }
}
