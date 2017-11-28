<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\File;

class GetMedia
{
	protected $targetPath;

	public function __construct( $targetPath)
	{

		$this->targetPath = $targetPath;
	}

	public function getFileByName($fileName)
	{
		$file = new File($this->targetPath . '/' .$fileName);

		return $file;
	}
}