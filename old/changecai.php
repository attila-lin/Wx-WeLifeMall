<?
//  防止全局变量造成安全隐患
$mno = false;
$mid = false;
//  启动会话，这步必不可少
session_start();

$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");



if($_POST){
	// print_r($_POST);
	include( 'conn.php' );

	$cname = $_POST[cname];
	$cprice = $_POST[cprice];
	$belifcontent = $_POST[belifcontent];
	$type = $_POST[type];

	$query = mysql_query("UPDATE cai SET `cname` = '$cname', `cprice` = `cprice`, `belifcontent` = '$belifcontent', `type` = '$type' WHERE `cno`= '$_POST[cno]' ");
	echo "<p>修改成功</p><br />
	<a href='manage_cai.php?cno=" . $_POST[cno] . "'>继续修改图片</a><br />
	<a href='delete.php' >返回删除修改界面</a><br />
	";
}
?>