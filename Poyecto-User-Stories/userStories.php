<?php

class userStories
{
    public static function userRegister()
    {
        $nombre = fgets(STDIN);
        echo "Hola $nombre";
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

    public static function listAvaibleBooks(){

        return $this
    }
}