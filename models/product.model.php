<?php
require "../configs/database.config.php";

class ProductModel {
    private $pdo;

    function __construct()
    {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    function getAllProducts()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM product');
        $stmt->execute();

        return $stmt;
    }

    function deleteProduct($productID) {
        $stmt = $this->pdo->prepare('DELETE FROM product WHERE id=:id');
        $stmt->bindValue(':id', $productID);
        $stmt->execute();

        return $stmt;
    }
}
?>