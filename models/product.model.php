<?php
require "../configs/database.config.php";

class ProductModel {
    private $pdo;

    function __construct() {
        $database = new Database();
        $this->pdo = $database->connect();
    }

    function getAllProducts() {
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

    function addProduct($product) {
        $stmt = $this->pdo->prepare('INSERT INTO product(name, imageURL, description, price, amount) VALUE 
         (:name, :imageURL, :description, :price, :amount)');
        $stmt->bindValue(':name', $product["name"]);
        $stmt->bindValue(':imageURL', $product["imageURL"]);
        $stmt->bindValue(':description', $product["description"]);
        $stmt->bindValue(':price', $product["price"]);
        $stmt->bindValue(':amount', $product["amount"]);
        $stmt->execute();

        return $stmt;
    }
}
?>