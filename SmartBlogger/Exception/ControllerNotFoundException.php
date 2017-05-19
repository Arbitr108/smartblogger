<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 15:05
 */

namespace SmartBlogger\Exception;


use Exception;

class ControllerNotFoundException extends SmartException
{
	public function __construct($message, $code = 404, Exception $previous = null)
	{
		parent::__construct($message, $code, $previous);
	}
}