<?php
interface BookRepositoryInterface {
    public function getBooks(): array;
    public function addBook(array $book): bool;
}