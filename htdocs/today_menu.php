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

if(!isset($_GET['category'])){
	$category = 'chinese';
}
else{
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
}
$food = new food($db, $category);

$smarty->assign("foods", $food->getAllFood());
print_r($food->getAllFood());


// $smarty->display('today_menu.html');