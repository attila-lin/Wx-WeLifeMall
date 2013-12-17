<?
//  防止全局变量造成安全隐患
$mno = false;
$mid = false;
//  启动会话，这步必不可少
session_start();

$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");

?>

<HTML>                          
	<HEAD>    
	
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">                     
		<TITLE></TITLE>          
	</HEAD> 
	<?if ($_GET[type]) {
		$type = $_GET[type];
	}
	?>

    <a href=<? echo '"sort_cai.php?type=' . $type . '&action=recommond"'?> target="test">设置推荐菜单</a><br />
    <a href=<? echo '"sort_cai.php?type=' . $type . '&action=normal"'?> target="test">设置菜单</a><br />
    <iframe src="" id="test" width="800" height="400"  scrolling="yes" frameborder="1">
    </iframe>
    <br />
    <a href='main.php'>返回</a>
    
</HTML>