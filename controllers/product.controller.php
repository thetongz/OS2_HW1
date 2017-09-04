<?php
require "../models/product.model.php";
require "../dataSources/product.dataSource.php";

function getAllProduct() {
    $productModel = new ProductModel();
    $result = $productModel->getAllProducts();

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function deleteProduct($productID) {
    $productModel = new ProductModel();
    $result = $productModel->deleteProduct($productID);

    return $result->rowCount();
}

function addProduct($name, $imageURL, $description, $price, $amount) {
    $product = createProductObject($name, $imageURL, $description, $price, $amount);
    $productModel = new ProductModel();
    $result = $productModel->addProduct($product);

    return $result;
}
?>