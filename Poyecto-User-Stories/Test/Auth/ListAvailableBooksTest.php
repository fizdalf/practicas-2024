<?php

use PHPUnit\Framework\TestCase;

class ListAvailableBooksTest extends TestCase
{
    protected $userStories;

public function testShouldReturnAvailableBooks()
{
    $books = array(
            array('id' => 1, 'title' => 'Cien años de soledad'),
            array('id' => 2, 'title' => 'Don Quijote de la Mancha'),
            array('id' => 3, 'title' => 'El código Da Vinci')
    );


    //Arreglar Añadir Quien y Cuando

    $loans = array(
            array('book_id' => 1, 'returned' => false, 'borrower' => 'Juan', 'borrowed_at' => '2024-05-10'),
            array('book_id' => 2, 'returned' => true, 'borrower' => 'María', 'borrowed_at' => '2024-04-25'),
            array('book_id' => 3, 'returned' => false, 'borrower' => 'Pedro', 'borrowed_at' => '2024-05-01')
    );

    $this->userStories->listAvailableBooks();

    $availableBooks = $this->userStories->listAvailableBooks();

    $expectedResult = array(
            array('id' => 2, 'title' => 'Don Quijote de la Mancha')
    );

    $this->assertEquals($expectedResult, $availableBooks);
    }
}