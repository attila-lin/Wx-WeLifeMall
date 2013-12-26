<?php
 /**
 * Example Application

 * @package Example-application
 */

require 'init.php';


$smarty = new Smarty;

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);


$chinese = new food($db, 'chinese');
$western = new food($db, 'western');
$fruit = new food($db, 'fruit');
$dessert = new food($db, 'dessert');

$smarty->assign("chinese", $chinese->getAllFood());
$smarty->assign("western", $western->getAllFood());
$smarty->assign("fruit", $fruit->getAllFood());
$smarty->assign("dessert", $dessert->getAllFood());

if(isset($_POST['action']) && $_POST['action'] == 'recommond' ){
	if(isset($_POST['category'])){
		switch ($_GET['category']) {
			case '1':
				$category = 'chinese';
				break;
			case '2':
				$category = 'western';
				break;
			case '3':
				$category = 'fruit';
				break;
			case '4':
				$category = 'dessert';
				break;
			default:
				break;	
		}
		$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
		$food = new food($db, $category);
		$ids = split("\|", $_GET['id']);
		print_r($ids);
		$food->setRecommond($ids);
	}
}

// print_r($food->getAllFood());


$smarty->display('today_menu.html');