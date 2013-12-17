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
  	<form action='adddel_cai.php' method='post'>
  		<?
  		include( 'conn.php' );
  		$query = mysql_query("SELECT `cno`,`cname` from `cai`");
  		while( $row = mysql_fetch_array($query) ){
  			echo '<input type="checkbox" name="' . $row[cno] . '" /><a href="cai.php?cno=' . $row[cno] . '">' . $row[cname] . '</a> <a href="manage_cai.php?cno='  . $row[cno] . '">修改</a> <br />';
  		}
  		?>
      <input type='submit' name='action' value='del'/>
  	</form>

  	<br />
    <br />
  	<a href='main.php'>返回</a>
  	</body>
</html>