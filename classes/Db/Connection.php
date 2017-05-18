<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 18.05.2017
 * Time: 16:22
 */

namespace Classes\Db;

use PDO;

class Connection
{
	private static $_instance;
	private $_username;
	private $_password;
	private $_host;
	private $_dbname;
	private $_connection;

	private function __construct(){
		$this->_dbname = getenv("DB_NAME");
		$this->_host = getenv("DB_HOST");
		$this->_username = getenv("DB_USER");
		$this->_password = getenv("DB_PASSWORD");
		$this->_connection = new PDO("mysql:dbname={$this->_dbname};host={$this->_host}",
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

	public function query($sql, $args){
		$connection = $this->getConnection();
		$stmt = $connection->prepare($sql);
		$stmt->execute($args);
		return $stmt;
	}

	private function __clone() { }
}