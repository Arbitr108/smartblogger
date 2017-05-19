<?php
namespace Ui\View;

use Ui\Exception\PresenterException;

/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 9:24
 */
class View
{
	private $_layout;
	private $_data;
	private $_content;

	const DEFAULT_LAYOUT = 'default.php';

	const TEMPLATES_PATH = BASE_DIR . '/plugins/Ui/templates/';

	public function prepare()
	{
		if($this->getLayout()){
			$template = self::TEMPLATES_PATH . $this->getLayout() . '.php';
		} else {
			$template = self::TEMPLATES_PATH . self::DEFAULT_LAYOUT;
		}
		if(file_exists($template) && is_readable($template)){
			$this->compile($template);
		} else {
			throw new PresenterException(sprintf("Template not found %s", $template));
		}

		return $this->_content;
	}


	public function setData($_data)
	{
		$this->_data = $_data;
	}

	private function getData()
	{
		return $this->_data;
	}


	/**
	 * @return mixed
	 */
	public function getLayout()
	{
		return $this->_layout;
	}

	/**
	 * @param mixed $_layout
	 */
	public function setLayout($_layout)
	{
		$this->_layout = $_layout;
	}

	/**
	 * @param $template
	 */
	private function compile($template)
	{
		ob_start();
		$data = $this->getData(); //data needed in the view
		include $template;
		$this->_content = ob_get_contents();
		ob_end_clean();
	}


}