<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 9:21
 */

namespace Storage;


class MysqlStorageConfiguration
{

	/**
	 * @var string
	 */
	private $host;

	/**
	 * @var int
	 */
	private $port;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @var string
	 */
	private $password;

	public function __construct(string $host, int $port, string $username, string $password)
	{
		$this->host = $host;
		$this->port = $port;
		$this->username = $username;
		$this->password = $password;
	}

	public function getHost(): string
	{
		return $this->host;
	}

	public function getPort(): int
	{
		return $this->port;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

}