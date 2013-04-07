<?php

namespace S4\Common;

use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;

class S4DirectoryIterator
{
	public $fileOrfolders = array();

	public function receiveFolderOrFileUnzipedAndList($fileName)
	{
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($fileName));
		while($iterator->valid()) {
		    if (!$iterator->isDot()) {
		    	$i = $iterator->getSubPath() == '' ? 0 : $iterator->getSubPath();
		    	$this->fileOrfolders[] = array($i => $iterator->getSubPathName());
		    }
		    $iterator->next();
		}		

		return $this->fileOrfolders;
	}
}