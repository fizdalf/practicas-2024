<?php

public function suspendUserAccountTest()
{
    $userId = 1;

    $result = $this->userRepository->suspendUserAccount($userId);

    if ($result) {
        echo "La cuenta del usuario ha sido suspendida exitosamente.\n";
    } else {
        echo "Hubo un error al suspender la cuenta del usuario.\n";
    }
}