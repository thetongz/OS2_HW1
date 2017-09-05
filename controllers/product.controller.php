<?php
require "../models/product.model.php";
require "../dataSources/product.dataSource.php";

class ProductController {
    private $productModel;

    function __construct() {
        $this->productModel = new ProductModel();
    }

    function getAllProducts() {
        $result = $this->productModel->getAllProducts();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteProduct($productID) {
        $result = $this->productModel->deleteProduct($productID);

        return $result->rowCount();
    }

    function addProduct($name, $imageURL, $description, $price, $amount) {
        $product = createProductObject($name, $imageURL, $description, $price, $amount);
        $result = $this->productModel->addProduct($product);

        return $result;
    }
}
?>