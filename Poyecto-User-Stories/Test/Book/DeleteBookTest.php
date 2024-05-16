<?php

class DeleteBookTest extends TestCase
{
    protected $adminStories;

    public function setUp(): void
    {
        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $loanRepositoryMock = $this->createMock(LoanRepositoryInterface::class);
        $this->adminStories = AdminStories($bookRepositoryMock, $loanRepositoryMock);
    }

    public function testDeleteBook()
    {
        $bookId = 1;

        $bookRepositoryMock = $this->createMock(BookRepositoryInterface::class);
        $bookRepositoryMock-method('deleteBook')-with($bookId)->willReturn(true);

        $this->adminStories = new AdminStories($bookRepositoryMock, $this->createMock(LoanRepositoryInterface::class));

        ob_start();
        $this->adminStories->deleteBookTest();
        $output = ob_get_clean();

        $this->assertEquals("El libro ha sido eliminado con exito!. \n", $output);
    }
}