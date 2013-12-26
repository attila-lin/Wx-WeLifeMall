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

$smarty = new Smarty;
// **********************************
// ### 8.管理用户
// 	$users = array("uid", "openid", "anos"=array(), "pnos"=array() )
// 	methor: GET
// 	action: food.php
// 	data:
// 		// 默认全部输出
// 		num  // 每页数
// 		page // 页号
// 	result:
// 		成功: $users = array("uid", "openid", "anos"=array(), "pnos"=array() )
// 		失败: 
// **********************************


$num  = isset($_GET['num'])  ? $_GET['num']  : 0;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);

$user = new user($db);

$users = $user->getAllUser();

foreach ($users as $key => &$value) { 
	// print_r($value);
	$anos = $user->getAddressClass()->findAddr($value['uid']);
	$pnos = $user->getPhoneClass()->findPhone($value['uid']);
	$value['anos'] = $anos;
	$value['pnos'] = $pnos;
}
// print_r($users);

if(!isset($_GET['num'])){
	$smarty->assign("users",$users);
}
else{
	$users = array_chunk($users, intval($num));
	$smarty->assign("users", $users[intval($page)-1]);
}

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);

$smarty->display('address_and_phone.html');
