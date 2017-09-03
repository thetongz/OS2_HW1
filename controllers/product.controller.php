<?php
require "../models/product.model.php";

function getAllProduct()
{
    $productModal = new ProductModel();
    $result = $productModal->getAllProducts();

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

?>