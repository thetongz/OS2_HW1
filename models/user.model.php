<?php
require "../configs/database.config.php";

    class UserModel {
        function connectDatabase() {
            $database = new Database();

            return $database->connect();
        }

        function hashPassword($password) {
            $hashed = md5($password);

            return $hashed;
        }

        function signIn($username, $password) {
            $pdo = $this->connectDatabase();
            $hashedPassword = $this->hashPassword($password);
            $stmt = $pdo->prepare('SELECT * FROM user 
          WHERE username=:username AND password=:password ');
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $hashedPassword);
            $stmt->execute();

            return $stmt;
        }
    }
?>