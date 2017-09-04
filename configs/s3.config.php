<?php

require '../static/vendor/autoload.php';

use Aws\S3\S3Client;

$config = [
    's3' => [
        'key' => 'AKIAJDKCGRSDWSCJJEJQ',
        'secret' => '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',
        'bucket' => 'test-upload-thetong',
        'baseURL' => 'https://s3-ap-southeast-1.amazonaws.com'
    ]
];

$s3 = S3Client::factory([
    'key' => $config['s3']['key'],
    'secret' => $config['s3']['secret']
]);
?>