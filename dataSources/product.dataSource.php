<?php

class ProductDataSource {
    function createProductObject($name, $imageURL, $description, $price, $amount) {
        return [
            'name' => $name,
            'imageURL' => $imageURL,
            'description' => $description,
            'price' => intval($price),
            'amount' => intval($amount)
        ];
    }
}
?>