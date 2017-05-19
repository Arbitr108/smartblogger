<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 13:32
 */

namespace SmartBlogger\Application\Commands;


class PresentCommand
{
	private $data;

	/**
	 * PresentEvent constructor.
	 * @param $data
	 */
	public function __construct($data)
	{
		$this->data = $data;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param mixed $data
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	public function get($key){
		return isset($this->data[$key]) ? $this->data[$key] : null;
	}


}