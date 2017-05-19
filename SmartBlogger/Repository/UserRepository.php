<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 14:36
 */

namespace SmartBlogger\Repository;


use SmartBlogger\Application\PluginRegistry;
use SmartBlogger\Storage\StorageInterface;

class UserRepository
{
	/**
	 * @var StorageInterface
	 */
	private $_storage;

	public function __construct(StorageInterface $storage){
		$this->_storage = $storage;
	}


	public function findByEmail($email){

		$this->_storage->prepareQuery("SELECT * user where email = ? ", [$email]);

		return $this->_storage->executeQuery();
	}
}