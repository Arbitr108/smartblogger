<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 15:24
 */

namespace SmartBlogger\Controller;


use SmartBlogger\Application\PluginRegistry;
use SmartBlogger\Application\Request;
use SmartBlogger\Repository\UserRepository;

class AuthController extends BaseController
{

	public function login(){
		if(Request::isPost()){
			$email = Request::postParam("email");
			$password = Request::postParam("password");

			//TODO:this part Storage injecting must be made through DI
			$repository = new UserRepository(PluginRegistry::get(PluginRegistry::STORAGE));

			$user = $repository->findByEmail($email);
			//TODO: here i planned to try login
			//TODO: password i would keep bcrypted with salt
		}
	}
}