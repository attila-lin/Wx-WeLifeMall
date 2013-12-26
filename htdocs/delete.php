<?php
 /**
 * Example Application

 * @package Example-application
 */

require 'init.php';

//  防止全局变量造成安全隐患
$isLogin = false;
//  启动会话，这步必不可少
session_start();

if(!admin::isLogin()) {
	forward("login.php");
}

// ### 5.删除菜
// 	$foods = array(id, name)
// 	methor: POST
// 	action: delete.php
// 	data:
// 		id = 1|2|3   // 用'|'分隔
// 		category = 1 // category 为数字 1,2,3,4 分别对应四个类别
// 		action = delete
// 	result:
// 		成功: $log = 1
// 		失败: $log = 0
$smarty = new Smarty;

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);


if (isset($_POST['action']) && $_POST['action'] == "delete") {
	$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
	switch ($_POST['category']) {
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
	$food = new food($db, $category);

	$id = split ("|", $_POST['id']);

	$log = $food->delFood($id);
	if($log){

	}
	else{
		
	}
}
$food = new food($db, 'chinese');
// print_r($food->getAllFood());
$smarty->assign("foods", $food->getAllFood());


$smarty->display('delete.html');