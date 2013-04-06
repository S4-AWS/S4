<?php

require '../bootstrap.php';

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;

// Instantiate the S3 client with your AWS credentials and desired AWS region
$client = S3Client::factory(array(
    'key'    => 'your-aws-access-key-id',
    'secret' => 'your-aws-secret-access-key',
));

echo __FILE__;