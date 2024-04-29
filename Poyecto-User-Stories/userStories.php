<?php

class userStories
{
    public static function userRegister()
    {
        return "registrao";
    }

    public static function userLogin($email, $password)
    {
        $emailCorrecto = "usuario@gmail.com";
        $passwordCorrecto = "1234";

        if ($email === $emailCorrecto && $password === $passwordCorrecto){
            return "Credenciales Correctas";
        } else {
            return "Credenciales Incorrectas";
        }
    }

    public static function listAvailableBooks($books, $loans){
        $availableBooks = array();
        foreach ($books as $book){
            if(!self::isBookOnLoan($book["id"], $loans)) {
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }

    public static function isBookOnLoan($bookId, $loans)
    {
        foreach ($loans as $loan) {
            if ($loan['book_id'] == $bookId && !$loan['returned']) {
                return true;
            }
        }
        return false;
    }
}