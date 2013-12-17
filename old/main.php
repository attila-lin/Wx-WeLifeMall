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


<html>
  <head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>管理界面</title>
  </head>
  <body>

  欢迎登录管理界面<br />
  <a href='insert.php' >添加菜品</a> <br />
  <a href='delete.php' >删除修改菜品</a> <br />
  设置今日菜品 <br />
  <a href='setmenu.php?type=restaurant' >餐厅</a> <br />
  <a href='setmenu.php?type=vegetable' >净菜</a> <br />
  <a href='setmenu.php?type=hot' >火锅</a> <br />
  <a href='setmenu.php?type=local' >土特团</a> <br /><br />

  <a href='today.php?type=vegetable' target="_blank">今日菜单</a> <br /><br />

  <a href=''>管理地址 
管理手机

  <form action='login.php' method='post'>
      <input type='submit' name='action' value='logout'/>
  </form>

  </body>
</html>