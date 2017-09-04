<?php

function createProductObject($name, $imageURL, $description, $price, $amount) {
    return [
        'name' => $name,
        'imageURL' => $imageURL,
        'description' => $description,
        'price' => $price,
        'amount' => $amount
    ];
}
?>