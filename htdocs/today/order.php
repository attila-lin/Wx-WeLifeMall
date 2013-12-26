<?php
 /**
 * Example Application

 * @package Example-application
 */

require '../init.php';

$smarty = new Smarty;
$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);
// **********************************
// ### 微信点菜
// #### 1.查看今日菜单
//  food = array("id", "name", "price", "pic", "content", "recommond")
// 	methor: GET
// 	action: today.php
// 	data:
// 		// category 为数字 1,2,3,4 分别对应四个类别
// 		category
// 	result:
// 		成功: $log = 1
// 		失败: $log = 0
// **********************************
$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
if(isset($_GET['uid'])){
	$uid = intval($_GET['uid']);

	$address = new address($db);
	$phone = new phone($db);
	$addr = $address->findAddr($uid);
	$phon = $phone->findPhone($uid);
	if(!$addr){
		$addr = array();
	}
	if(!$phon){
		$phon = array();
	}
	// print_r($addr);
	// print_r($phon);
	$smarty->assign("addresses", $addr);
	$smarty->assign("phones",    $phon);
}


if(isset($_POST['action']) && $_POST['action'] == 'order'){
	$uid = isset($_POST['uid']) ? $_POST['uid'] : exit(-1);

	$chinese = isset($_POST['chinese']) ? $_POST['chinese'] : '';
	$western = isset($_POST['western']) ? $_POST['western'] : '';
	$fruit   = isset($_POST['fruit'])   ? $_POST['fruit']   : '';
	$dessert = isset($_POST['dessert']) ? $_POST['dessert'] : '';

	$time = date("Y-m-d H:i:s");

	$price = isset($_POST['price']) ? $_POST['price'] : exit(-1);

	$order = new order($db);

	$price = isset($_POST['address']) ? $_POST['address'] : exit(1);


	// address or ano  // 如为新address，先insert，再取出ano
	// phone   or pno  // 如为新phone  ，先insert，再取出pno
	if(isset($_POST['address'])){
		$address = new address($db);
		$ano = $address->addAddr($uid, $_POST['address']);
	}else if(isset($_POST['ano'])){
		$ano = intval($_POST['ano']);
	}

	if(isset($_POST['phone'])){
		$phone = new phone($db);
		$pno = $phone->addPhone($uid, $_POST['phone']);
	}elseif(isset($_POST['pno'])){
		$pno = intval($_POST['pno']);
	}

	$log = $order->addOrder($uid, $chinese, $western, $fruit, $dessert, $time, $price, $ano, $pno, $status=1);
	if($log){

	}
	else{
		exit(-1);
	}
}


$smarty->display('today/order.html');