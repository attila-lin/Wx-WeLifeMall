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
$orders = $order->getAllOrder();
foreach ($orders as $key => $value) {
	$fidvalue = $value['fids'];
	$value['fids'] = array();
	print_r($order->getFidArray($fidvalue));
	$value['fids'] = $order->getFidArray($fidvalue); 
}
print_r($orders);

if(!isset($_GET['num']))
	$smarty->assign("orders",$orders);
else{
	$orders = array_chunk($orders, intval($num));
	$smarty->assign("orders", $orders[intval($page)-1]);
}


$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);


// $smarty->display('order_manage.html');
