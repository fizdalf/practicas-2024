<?php
class YourBookRepository implements BookRepositoryInterface {
    public function getBooks(): array {
        return [
                ['id' => 1, 'title' => 'Libro 1'],
                ['id' => 2, 'title' => 'Libro 2'],
                ['id' => 3, 'title' => 'Libro 3']
        ];
    }
}