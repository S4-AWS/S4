<?php

namespace S4;

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;
use S4\AwsConventions\AwsObject;

class S4
{
	public $clientAws;
	public $bucketName;
	public $data;

	public function __construct(S3Client $client)
	{
		$this->clientAws = $client;
	}

	public function createBucketOnS3()
	{
		$result = $this->clientAws->createBucket(array('Bucket' => $this->bucketName));
		$this->clientAws->waitUntil('BucketExists', array('Bucket' => $this->bucketName));
	}

	public function setBucketName($string = null)
	{
		$this->data = date('y-m-d');
		if (is_null($string)) {
			$name = 'aws-hackathon-phpsp-' . $this->data;
		} else {
			$name = $string;
		}
		$this->bucketName = $name;

		return $this->bucketName;
	}
}