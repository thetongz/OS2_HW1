<?php
require "../configs/database.config.php";

class ProductModel {
    function connectDatabase() {
        $database = new Database();

        return $database->connect();
    }

    function getAllProducts() {
        $pdo = $this->connectDatabase();
        $stmt = $pdo->prepare('SELECT * FROM product');
        $stmt->execute();

        return $stmt;
    }
}
?>