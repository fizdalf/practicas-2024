<?php
class AdminLogin
{
    public function adminLogin($email, $password)
    {
        $emailCorrecto = "admin";
        $passwordCorrecto = "admin";

        if ($email === $emailCorrecto && $password === $passwordCorrecto) {
            return "Credenciales Correctas";
        } else {
            return "Credenciales Incorrectas";
        }
    }
}