<?php
namespace SmartBlogger\Presenter;
use SmartBlogger\Application\Commands\PresentCommand;

/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 8:22
 */
interface PresenterCommandInterface
{

	function handle(PresentCommand $command);
}