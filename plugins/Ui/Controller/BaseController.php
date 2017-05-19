<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 12:04
 */

namespace Ui\Controller;


class BaseController
{
	protected $data;
	private $content;

	public function __construct(array $views)
	{
		$this->loadView($views);
	}

	/**
	 * @return array data passed to the view
	 */
	protected function getData(){
		return $this->data;
	}

	protected function loadView(array $views) {
		ob_start();
		$data = $this->getData(); //data needed in the view
		foreach ($views as $k => $view) {
			include $view;
		}
		$content = ob_get_contents();
		ob_end_clean();
		$this->content = $content;
	}

	public function out() {
		return $this->content;
	}
}