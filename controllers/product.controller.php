<?php
require "../models/product.model.php";

function getAllProduct()
{
    $productModel = new ProductModel();
    $result = $productModel->getAllProducts();

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function deleteProduct($productID) {
    $productModel = new ProductModel();
    $result = $productModel->deleteProduct($productID);

    if($result->rowCount()) {
        return true;
    }else{
        return false;
    }
}
?>