<?php

$uploadImagePath = "../static/images";
$displayImagePath = "static/images";

function uploadImage($name, $tempName) {
    global $uploadImagePath, $displayImagePath;
    $tempFilePath = "{$uploadImagePath}/{$name}";
    move_uploaded_file($tempName, $tempFilePath);

    return "{$displayImagePath}/{$name}";
}
?>