<?php

namespace S4\Common;

class S4DirectoryIteratorTest extends \PHPUnit_Framework_TestCase
{
	protected $site = "__DIR__/web/site";
	protected $dirCss = "__DIR__/web/site/css";
	protected $dirJs = "__DIR__/web/site/js";
	protected $dirImg = "__DIR__/web/site/img";
	protected $dirVendorJs = "__DIR__/web/site/js/vendor";

	protected function setUp()
	{
		$this->createSampleFiles();
	}	

	protected function tearDown()
	{
		system('/bin/rm -rf ' . escapeshellarg($this->site));
	}

	protected function createSampleFiles()
	{
		system('/bin/rm -rf ' . escapeshellarg($this->site));

		mkdir($this->site, 0777, true);
		fopen($this->site . "/index.html", 'x');
		fopen($this->site . "/evento.html", 'x');
		fopen($this->site . "/contato.html", 'x');

		mkdir($this->dirCss, 0777, true);
		fopen($this->dirCss . "/style_1.css", 'x');
		fopen($this->dirCss . "/style_2.css", 'x');

		mkdir($this->dirJs, 0777, true);
		fopen($this->dirJs . "/scripts_1.js", 'x');
		fopen($this->dirJs . "/scripts_2.js", 'x');

		mkdir($this->dirImg, 0777, true);
		fopen($this->dirImg . "/img_1.txt", 'x');
		fopen($this->dirImg . "/img_2.txt", 'x');
		fopen($this->dirImg . "/img_3.txt", 'x');
		fopen($this->dirImg . "/img_4.txt", 'x');
		fopen($this->dirImg . "/img_5.txt", 'x');

		mkdir($this->dirVendorJs, 0777, true);
		fopen($this->dirVendorJs . "/scripts_vendor_1.js", 'x');
		fopen($this->dirVendorJs . "/scripts_vendor_2.js", 'x');
		fopen($this->dirVendorJs . "/scripts_vendor_3.js", 'x');
	}

	public function assertPreConditions()
	{
		$this->assertTrue(
			class_exists($class = 'S4\Common\S4DirectoryIterator'), 
			"Class not Found $class"
		);
	}

	public function testInstantiationWithoutArgumentsShowdWork()
	{
		$instance = new S4DirectoryIterator;
		$this->assertInstanceOf('S4\Common\S4DirectoryIterator', $instance);
	}

	public function testListFilesAndFoldersWithValidArgumentsSholdWork()
	{
		$instance 	=  new S4DirectoryIterator;
		$result 	= $instance->receiveFolderUnzipedAndList($this->site);
		$expected 	= array(
			0 => array(0 => 'img'),
			1 => array('img' => 'img/img_4.txt'),
			2 => array('img' => 'img/img_1.txt'),
			3 => array('img' => 'img/img_2.txt'),
			4 => array('img' => 'img/img_3.txt'),
			5 => array('img' => 'img/img_5.txt'),
			6 => array(0 => 'index.html'),
			7 => array('js' => 'js/scripts_2.js'),
			8 => array('js/vendor' => 'js/vendor/scripts_vendor_2.js'),
			9 => array('js/vendor' => 'js/vendor/scripts_vendor_3.js'),
			10 => array('js/vendor' => 'js/vendor/scripts_vendor_1.js'),
			11 => array('js' => 'js/scripts_1.js'),
			12 => array(0 => 'contato.html'),
			13 => array('css' => 'css/style_2.css'),
			14 => array('css' => 'css/style_1.css'),
			15 => array(0 => 'evento.html')
		);
		$this->assertEquals($result, $expected, 'The espected content of list files is different of expected');
	}
}