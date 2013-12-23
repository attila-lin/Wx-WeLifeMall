<?php
 /**
 * Example Application

 * @package Example-application
 */

require 'init.php';

session_start();

if(!admin::isLogin()) 
{
	if (isset($_POST['action']) && $_POST['action'] == "login") 
	{
		
		$db	 	= new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		$admin	= new admin($db);
		$log	= $admin->login($_POST['uname'], $_POST['pwd']); 
		if ($log) 
		{
			forward("index.php");				
		}
		else 
		{
			$smarty = new Smarty;

			$smarty->setTemplateDir(WE_TEMPLATE_DIR);
			$smarty->setCompileDir(WE_COMPILE_DIR);
			$smarty->setConfigDir(WE_CONFIG_DIR);
			$smarty->setCacheDir(WE_CACHE_DIR);

			$smarty->display('login.html');
			exit();
		}
	}
	else  
	{
		$smarty = new Smarty;

		$smarty->setTemplateDir(WE_TEMPLATE_DIR);
		$smarty->setCompileDir(WE_COMPILE_DIR);
		$smarty->setConfigDir(WE_CONFIG_DIR);
		$smarty->setCacheDir(WE_CACHE_DIR);

		$smarty->display('login.html');
		exit();
	}
}
else{
	forward("index.php");
}