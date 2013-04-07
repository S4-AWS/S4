<?php

require '../bootstrap.php';

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;
use Aws\S3\Model;

// Instantiate the S3 client with your AWS credentials and desired AWS region
$client = S3Client::factory(array(
    'key'    => CONFIG_S3_KEY,
    'secret' => CONFIG_S3_SECRET,
));

$bucket = 'aws-hackathon-phpsp-bucket-teste';

$result = $client->createBucket(
    array(
        'Bucket' => $bucket
    )
);

// Wait until the bucket is created
$client->waitUntil('BucketExists', array('Bucket' => $bucket));

//upload simple file
$client->putObject(array(
    'Bucket'     => 'aws-hackathon-phpsp-bucket-teste',
    'Key'        => 'index.html',
    'SourceFile' => 'index.html',
    'Metadata'   => array(
        'Content-Type' => 'text/html; charset=utf-8'
    )
));