<?php
 /**
 * Example Application

 * @package Example-application
 */

require '../init.php';

$smarty = new Smarty;

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

if(!isset($_GET['category'])){
	$_GET['category'] = '1'; // 设置默认界面为chinese
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


$db = new db(DB_HOST, DB_USER, DB_PWD, DB_NAME);
$food = new food($db, $category);
$foods = $food->getRecommond();

$smarty->assign("food", $foods);


if(isset(($_GET['openid']))){
	$openid = $_GET['openid'];
}
$user = new user($db);
$affectid = $user->findUser($openid);
if($affectid){
	$uid = $affectid;
}
else{
	$uid = $user->addUser($openid);
}
$smarty->assign("uid", $uid);

$smarty->setTemplateDir(WE_TEMPLATE_DIR);
$smarty->setCompileDir(WE_COMPILE_DIR);
$smarty->setConfigDir(WE_CONFIG_DIR);
$smarty->setCacheDir(WE_CACHE_DIR);

// $smarty->testInstall();

// $smarty->force_compile = true;
// $smarty->debugging = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;

$smarty->display('today/index.html');