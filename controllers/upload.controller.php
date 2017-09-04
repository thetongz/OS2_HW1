<?php

$imagePath = "../static/images";

function uploadImage($name, $tempName) {
    global $imagePath;
    $filePath = "{$imagePath}/{$name}";
    move_uploaded_file($tempName, $filePath);

    return $filePath;
}
?>