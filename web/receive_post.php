<?php
ini_set('display_errors', 1);
error_reporting(-1);

require '../vendor/autoload.php';

require '../config.php';

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;
use S4\S4;
use S4\Common\S4DirectoryIterator;
use S4\Common\Upload;

$client 	= S3Client::factory(array('key' =>  CONFIG_S3_KEY, 'secret' => CONFIG_S3_SECRET));
$s4 		= new S4($client);
exit;
$iterator 	= new S4DirectoryIterator();
$upload 	= new Upload($client);

// set o nome para bucket, se passar null ele cria u nome único, se setar um nome ele usa o que for setado
$bucketName = $s4->setBucketName('aws-hackathon-phpsp-bucket-teste');

// Cra um buket a partir do nome que foi passado
$s4->createBucketOnS3();

// //diretório de exemplo, removelo depois
$dir = '../tests/__DIR__/web/site';
 
$site = $iterator->receiveFolderUnzipedAndList($dir);

$result = $upload->uploadSite($site, $bucketName);