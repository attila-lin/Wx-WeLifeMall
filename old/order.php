<html>
  <head>
  	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>今日菜谱</title>
  </head>
   <body>
<?
if($_POST){
	print_r($_POST);
	include( 'conn.php' );
	if(!$_POST[newaddr]=='')
  		$query = mysql_query("INSERT INTO `address` (`openid`, `address`) VALUES ('$_POST[openid]','$_POST[newaddr]') ");
  	if(!$_POST[newphone]=='')
  		$query = mysql_query("INSERT INTO `phone` (`openid`, `phone`) VALUES ('$_POST[openid]','$_POST[newphone]') ");
}

echo "<br />下单成功";
?>
  	</body>
</html>