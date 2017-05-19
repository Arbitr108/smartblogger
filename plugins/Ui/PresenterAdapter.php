<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 12:46
 */

namespace Ui;

use SmartBlogger\Application\Commands\PresentCommand;
use SmartBlogger\Presenter\PresenterCommandInterface;
use Ui\Exception\PresenterException;
use Ui\View\View;

class PresenterAdapter implements PresenterCommandInterface
{
	public function handle(PresentCommand $command)
	{
		if(!$command->get('controller') || !$command->get('action'))
			throw new PresenterException();

		$view = new View();
		preg_match("~(\\w+)Controller~", $command->get('controller'), $matches);
		$folder = strtolower($matches[1]);

		$layout = sprintf("%s/%s", $folder, $command->get('action'));
		$view->setLayout($layout);
		$view->setData($command->get("data"));
		return $view->prepare();
	}


}