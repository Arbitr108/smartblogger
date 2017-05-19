<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 14:18
 */

namespace SmartBlogger\Repository;


use SmartBlogger\Storage\StorageInterface;

class ArticleRepository
{
	private $_storage;

	public function __construct(StorageInterface $storage){
		$this->_storage = $storage;
	}


	public function all(){
		$this->_storage->executeQuery();
	}
}