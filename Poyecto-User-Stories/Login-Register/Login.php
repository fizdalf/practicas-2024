<?php

class UserLogin
{
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
}