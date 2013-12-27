<?php
 /**
 * Example Application

 * @package Example-application
 */
 // error_reporting(0);
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
// ### 7.管理订单
// 	$orders = array("oid", "uid", "fids", "time", "price", "ano", "pno", "status" )
// 	// fids = array( [1] = {1|2|3} , [2] = {}, [3] = {}, [4] = {} )
// 	// status: 1.下单 2.运送 3.接收	
// 	methor: GET
// 	action: order_manage.php
// 	data:
// 		// 默认全部输出
// 		num  // 每页数
// 		page // 页号
// 	result:
// 		成功: $orders = array("oid", "uid", "fids", "time", "price", "ano", "pno", "status" )
// 		失败: 
// **********************************

$num  = isset($_GET['num'])  ? $_GET['num']  : 0;
$page = isset($_GET['page']) ? $_GET['page'] : 1;



$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
$order = new order($db);
$chinese = new food($db, "chinese");
$western = new food($db, "western");
$fruit   = new food($db, "fruit");
$dessert = new food($db, "dessert");

// function myfunction($v) 
// {
// 	if ($v != '')
// 	{
// 		return true;
// 	}
// 	return false;
// }

if(isset($_POST['action']) && $_POST['action'] == 'edit' ){
	$status = $_POST['status'];
	$id = $_POST['id'];
	$log = $orders->editOrder($id, $status);
	if($log){

	}
	else{
		
	}
}



$orders = $order->getAllOrder();

foreach ($orders as $key => &$value) {
	
	print_r($value);

	$chi_val = $value['chinese'];
	$wes_val = $value['western'];
	$fru_val = $value['fruit'];
	$des_val = $value['dessert'];

	$ano = $value['ano'];
	$pno = $value['pno'];

	$time = $value['time'];
	$status = $value['status'];

	$chi_arr = split("\|", $chi_val);
	$wes_arr = split("\|", $wes_val);
	$fru_arr = split("\|", $fru_val);
	$des_arr = split("\|", $des_val);

	// print_r($chi_arr);
	array_filter($chi_arr);
	foreach ($chi_arr as $key => $value) {
		if($value == '')
			unset($chi_arr[$key]);
	}
	$chi = $chinese->getFoods($chi_arr);

	
	array_filter($wes_arr);
	foreach ($wes_arr as $key => $value) {
		if($value == '')
			unset($wes_arr[$key]);
	}
	$wes = $western->getFoods($wes_arr);

	array_filter($fru_arr);
	foreach ($fru_arr as $key => $value) {
		if($value == '')
			unset($fru_arr[$key]);
	}
	$fru = $fruit->getFoods($fru_arr);

	array_filter($des_arr);
	foreach ($des_arr as $key => $value) {
		if($value == '')
			unset($des_arr[$key]);
	}
	$des = $dessert->getFoods($des_arr);

	// print_r($chi);
	// print_r($wes);
	// print_r($fru);
	// print_r($des);

	$food = array();
	array_push($food, $chi, $wes, $fru, $des);
	$value['food'] = $food;


	$value['ano'] = $order->getAddressClass()->getAddr($ano);

	$value['pno'] = $order->getPhoneClass()->getPhone($pno);

	$value['time'] = $time;
	$value['status'] = $status;

}
// print_r($orders);

if(!isset($_GET['num']))
	$smarty->assign("orders",$orders);
else{
	$orders = array_chunk($orders, intval($num));
	$smarty->assign("orders", $orders[intval($page)-1]);
}

$smarty->assign("orders", $orders);

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);


$smarty->display('order_manage.html');
