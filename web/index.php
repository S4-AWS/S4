<?php

require '../bootstrap.php';

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;

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

var_dump($result);

// Wait until the bucket is created
$client->waitUntil('BucketExists', array('Bucket' => $bucket));

