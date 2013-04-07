<?php

namespace S4\Common;

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;
use S4\AwsConventions\AwsObject;

class Upload
{
	public $clientAws;

	public function __construct(S3Client $client)
	{
		$this->clientAws = $client;
	}

	public function uploadSite($site, $bucketName)
	{
		$result = array();
		foreach ($site as $k=>$v) {
			$object = new AwsObject();
			$object->setBucketName($bucketName);
			$object->setKeyFileAndPath($v[0]);
			$object->setSourceFile($v[1]);
			$object->setMetadata();

			$result[] = $this->clientAws->putObject($object->makeObject());
		}
		return $result;
	}
}