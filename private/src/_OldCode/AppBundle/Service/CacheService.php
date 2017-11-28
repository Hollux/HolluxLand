<?php
namespace AppBundle\Service;

class CacheService
{
	protected $cache;

	public function __construct($cache)
	{
		$this->cache = $cache;
	}

	public function getItem($name)
	{
		return $this->cache->getItem($name);
	}

	public function save($cachetElement)
	{
		return $this->cache->save($cachetElement);
	}

	public function deleteItem($name)
	{
		$this->cache->deleteItem($name);

		return $this;
	}


}