<html>
  <head>
  	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>今日菜谱</title>
  </head>
   <body>
   	<form action='order.php' method='post'>
<?
	
if($_GET[user]){
	echo "<input type='hidden' name='openid' value='" . $_GET[user] . "' />";
	// echo $_GET[user];
	include('conn.php');

	$query = mysql_query("SELECT * FROM `address` WHERE `openid`='$_GET[user]'");
	$addrs = array();
	while($row = mysql_fetch_array($query)){
		array_push($addrs, $row);
	}

	$query = mysql_query("SELECT * FROM `phone` WHERE `openid`='$_GET[user]'");
	$phones = array();
	while($row = mysql_fetch_array($query)){
		array_push($phones, $row);
	}


	foreach ($addrs as $addr) {
		echo "<input type='radio' name='address' value='" . $addr[ano] . "' /> " . $addr[address] . "<br />";	
	}
	echo "使用新地址 <input type='text' name='newaddr' /><br />";

	foreach ($phones as $phone) {
		echo "<input type='radio' name='phone' value='" . $phone[pno] . "' /> " . $phone[phone] . "<br />";	
	}
	echo "使用新电话 <input type='text' name='newphone' /><br />";

	echo "<input type='submit' value='提交'/>";
}
?>
	</form>
  </body>
</html>