<?php
/**
 * Created by Pavel Gorbatyuk.
 * Email: spec4web@gmail.com
 * Date: 19.05.2017
 * Time: 13:47
 */

return [
	"~articles/details/(\\d+)~" => "ArticleController@load",
	"~/articles/(\\d+)~" => "ArticleController@edit",
	"~articles~" => "ArticleController@index",
	"~login~" => "AuthController@login",
	"~~" => "AuthController@login",
];