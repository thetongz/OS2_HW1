<?php
session_start();
require "../models/user.model.php";

function signIn($username, $password)
{
    $userModal = new UserModel();
    $result = $userModal->signIn($username, $password);
    $isLoginSuccess = false;
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $isLoginSuccess = true;
        $_SESSION["username"] = $row["username"];
    }

    return $isLoginSuccess;
}

?>