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
$address = new address($db);
$phone = new phone($db);

$userarray = $user->getAllUser();

foreach ($userarray as $key => $value) {
	$anos = $address->getAddr($value['uid']);
	$pnos = $phone->getPhone($value['uid']);
	array_push($value, 'anos' => $anos, 'pnos' => $pnos);
}

if(!isset($_GET['num']))
	$smarty->assign("users",$users);
else{
	$users = array_chunk($users, intval($num));
	$smarty->assign("users", $users[intval($page)-1]);
}

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);

$smarty->display('address_and_phone.html');
