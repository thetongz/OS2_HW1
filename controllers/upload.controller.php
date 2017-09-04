<?php

use AWS\S3\Exception\S3Exception;

require "../configs/s3.config.php";

function uploadImageToS3($name, $tempName) {
    $tempFilePath = createTempFile($name, $tempName);
    try {
        $key = "uploads/{$name}";
        putObjectToS3($key, $tempFilePath);

        return $key;
    } catch(S3Exception $error) {
        die("There was an error uploading that file.");
    }
}

function createTempFile($name, $tempName) {
    $extension = explode('.', $name);
    $extension = strtolower(end($extension));
    $key = md5(uniqid());
    $tempFileName = "{$key}.{$extension}";
    $tempFilePath = "../static/images/{$tempFileName}";
    move_uploaded_file($tempName, $tempFilePath);

    return $tempFilePath;
}

function putObjectToS3($key, $filePath) {
    global $s3, $config;
    $s3->putObject([
        'Bucket' => $config['s3']['bucket'],
        'Key' => $key,
        'Body' => fopen($filePath, 'rb'),
        'ACL' => 'public-read'
    ]);
    unlink($filePath);
}

function getUploadedImageURL($key) {
    global $config;
    $imageURL = "{$config['s3']['baseURL']}/{$config['s3']['bucket']}/{$key}";

    return $imageURL;
}
?>