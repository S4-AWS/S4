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
		    	$i = $iterator->getSubPath() == '' ? 0 : $iterator->getSubPath();
		    	$this->fileOrfolders[] = array(
		    		$i => $iterator->getSubPathName(),
		    		'fileName' => $this->getFileName($iterator->getSubPathName())
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