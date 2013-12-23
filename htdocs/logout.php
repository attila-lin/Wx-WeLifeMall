<?php

require_once("init.php");

session_start();

if(admin::isLogin())
{
	admin::logout();
	forward("login.php");
}
else
{
	forward("login.php");
}
//*/
?>