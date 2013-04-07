<?php

namespace S4\AwsConventions;

class AwsObject
{
	public $bucketName;	
	public $keyFileAndPath;
	public $metadata = array();
	public $sourceFile;

	public function setBucketName($string = null)
	{
		$this->bucketName = $string;

		return $this;
	}

	public function getBucketName()
	{
		return $this->bucketName;
	}	

	public function setKeyFileAndPath($string)
	{
		$this->keyFileAndPath = $string;
	}

	public function getKeyFileAndPath()
	{
		return $this->keyFileAndPath;
	}

	public function setSourceFile($string)
	{
		$this->sourceFile = $string;
	}

	public function getSourceFile()
	{
		return $this->sourceFile;
	}

	public function setMetadata($array = null)
	{
		if (strstr($this->getSourceFile(),'html')) {
			$this->metadata = array( 'Content-Type' => 'text/html; charset=utf-8');	
		} else {
			$this->metadata = $array; 
		}		
	}

	public function getMetadata()
	{
		return $this->metadata;
	}

	public function makeObject()
	{
		$object = array(
		    'Bucket'     => $this->getBucketName(),
		    'Key'        => $this->getKeyFileAndPath(),
		    'sourceFile' => $this->getSourceFile(),
		    'Metadata'   => $this->getMetadata()
		);

		return $object;
	}
}