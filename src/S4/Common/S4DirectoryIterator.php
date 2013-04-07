<?php

namespace S4\Common;

use \RecursiveIteratorIterator;
use \RecursiveDirectoryIterator;

class S4DirectoryIterator
{	
	public $fileOrfolders = array();

	public function receiveFolderUnzipedAndList($fileName)
	{
		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($fileName));
		while($iterator->valid()) {
		    if (!$iterator->isDot()) {
		    	$this->fileOrfolders[] = array(
		    		0 => $iterator->getSubPathName(),
		    		1 => $this->getFileName($iterator->getSubPathName())
		    	);
		    }
		    $iterator->next();
		}		

		return $this->fileOrfolders;
	}

	public function getFileName($path)
	{
		$ex = explode(DIRECTORY_SEPARATOR, $path);
		return end($ex);
	}
}