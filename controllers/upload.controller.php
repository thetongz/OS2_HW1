<?php

use Aws\S3\Exception\S3Exception;

require "../configs/s3.config.php";

class UploadController {
    private $uploadImagePath;
    private $s3;
    private $s3Client;
    private $s3Bucket;

    function __construct() {
        $this->uploadImagePath = "../static/images";
        $this->s3 = new S3();
        $this->s3Client = $this->s3->createS3Client();
        $this->s3Bucket = $this->s3->getS3Bucket();
    }

    function uploadImage($name, $tempName) {
        $tempFilePath = "{$this->uploadImagePath}/{$name}";
        move_uploaded_file($tempName, $tempFilePath);

        $this->putObjectToS3($name, $tempFilePath);

        return $this->getUploadedImageUrl($name);
    }

    function putObjectToS3($key, $filePath) {
        try {
            $this->s3Client->putObject([
                'Bucket' => $this->s3Bucket,
                'Key' => $key,
                'Body' => fopen($filePath, 'rb'),
                'ACL' => 'public-read'
            ]);

            unlink($filePath);

        } catch (S3Exception $e) {
            echo $e;
        } 
    }

    function getUploadedImageUrl($key) {
        return "https://s3-ap-southeast-1.amazonaws.com/{$this->s3Bucket}/{$key}";
    }
}
?>