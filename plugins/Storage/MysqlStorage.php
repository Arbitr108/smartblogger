<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 18.05.2017
 * Time: 16:22
 */

namespace Storage;

use PDO;
use ReflectionClass;
use SmartBlogger\Storage\StorageInterface;
use Storage\Exception\MysqlStorageException;

class MysqlStorage implements StorageInterface
{
	private static $_instance;
	private $_username;
	private $_password;
	private $_host;
	private $_dbname;
	private $_connection;
	private $_sql;
	private $_bindings = [];
	/**
	 * @var \PDOStatement
	 */
	private $_statement;

	private function __construct(){
		$this->_dbname = getenv("DB_NAME");
		$this->_host = getenv("DB_HOST");
		$this->_username = getenv("DB_USER");
		$this->_password = getenv("DB_PASSWORD");
		$this->_connection = new PDO(sprintf("mysql:dbname=%s;host=%s",
			$this->_dbname,
			$this->_host),
			$this->_username,
			$this->_password);
	}

	public static function getInstance(){
		if(self::$_instance == null){
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	protected function getConnection(){
		return $this->_connection;
	}

	public function prepareQuery($sql, Array $bindings = []){
		$this->_sql = $sql;
		$this->_bindings = $bindings;
		$this->_prepareStatement();
	}

	private function _prepareStatement(){
		$connection = $this->getConnection();
		$stmt = $connection->prepare($this->_sql);
		$this->_statement = $stmt->execute($this->_bindings);
	}


//	public function _call($name, $arguments){
//		if(method_exists($this->_statement, $name)){
//			$storageReflect = new ReflectionClass($this->_statement);
//			if($storageReflect){
//				$calledMethod = $storageReflect->getMethod($name);
//				if($calledMethod->getNumberOfRequiredParameters() > 0){
//					$parameters = $calledMethod->getParameters();
//				}
//
//			}
//			$this->_statement->{$name};
//		}
//		throw new MysqlStorageException("Method {$name} not implemented");
//	}

	private function __clone() { }
	private function __wakeup() { }


	function executeQuery()
	{
		$this->_connection->query($this->_statement);
	}
}