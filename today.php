<html>
  <head>
  	<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>今日菜谱</title>
  </head>
  <body>
  <a href='today.php?type=restaurant'>餐厅</a>  
  <a href='today.php?type=vegetable'>净菜</a>  
  <a href='today.php?type=hot'>火锅</a>  
  <a href='today.php?type=local'>土特团</a><br />  

<?

if(!$_GET[type]){
	$_GET[type] = 'vegetable'; // 设置默认界面为净菜
}

include('conn.php');
// echo $_GET[type];
$all = mysql_query("SELECT * FROM `$_GET[type]`");

while($row = mysql_fetch_array($all)){
	// echo $row[type];
	if($row[type] == 0){
		echo "推荐<br />";
	}
	$query = mysql_query("SELECT * FROM `cai` WHERE `cno`='$row[cno]' limit 1");
	$cai = mysql_fetch_array($query);
	echo '<img src="caipic/' . $cai[cpic] . '"  alt="" height="80" width="90" /> <br />';
	echo '<a href="cai.php?cno=' . $cai[cno] . '">' . $cai[cname] . '</a> <br /><br />';
}


if($_GET[user]){
	echo "<br /><a href='info.php?user=" . $_GET[user] . "'>下单</a><br />";
}
?>

  </body>
</html>