<?php
namespace Ui\View;
use SmartProcessor\Presenter\PresenterInterface;

/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 9:24
 */
class ViewPresenter implements PresenterInterface
{
	private $layout;

	function present()
	{

		if($this->getLayout()){

			$template = '../templates/'.$this->getLayout().'.php';

			if(file_exists($template) && is_readable($template))
				require $template;
			else
				die;

		} else {

			$template = '../templates/default.php';

			if(file_exists($template) && is_readable($template))
				require $template;
			else
				die;
		}

	}

	/**
	 * @return mixed
	 */
	public function getLayout()
	{
		return $this->layout;
	}

	/**
	 * @param mixed $layout
	 */
	public function setLayout($layout)
	{
		$this->layout = $layout;
	}


}