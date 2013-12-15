<?
session_start();
$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");


// Array ( [1] => on [type] => vegetable [action] => recommond )
if($_POST[type] && $_POST[action]){
	// print_r($_POST);

	if($_POST[action] == 'recommond'){

		include('conn.php');
		//MYSQL 不允许在子查询的同时删除原表数据
		//$query = mysql_query("DELETE FROM `$_POST[type]` WHERE `cno` IN (SELECT `cno` FROM `$_POST[type]` WHERE `type`=0)");
		$query = mysql_query("SELECT `cno` FROM `$_POST[type]` WHERE `type`=0");
		while ($row = mysql_fetch_array($query)) {
			// echo $row[cno];
			mysql_query("DELETE FROM `$_POST[type]` WHERE `cno`='$row[cno]'");
		}

		foreach ($_POST as $key => $value) {
			// echo $key;
			if($key == 'type' || $key == 'action')
				continue;
			else{
				

				$cno = intval($key);
				// echo $cno;
				$query = mysql_query("INSERT INTO `$_POST[type]` (`cno`,`type`) VALUES ( $cno, 0 )");
			}
		}
	}
	elseif($_POST[action] == 'normal'){
		include('conn.php');
		//MYSQL 不允许在子查询的同时删除原表数据
		//$query = mysql_query("DELETE FROM `$_POST[type]` WHERE `cno` IN (SELECT `cno` FROM `$_POST[type]` WHERE `type`=0)");
		$query = mysql_query("SELECT `cno` FROM `$_POST[type]` WHERE `type`=1");
		while ($row = mysql_fetch_array($query)) {
			// echo $row[cno];
			mysql_query("DELETE FROM `$_POST[type]` WHERE `cno`='$row[cno]'");
		}
		
		foreach ($_POST as $key => $value) {
			// echo $key;
			if($key == 'type' || $key == 'action')
				continue;
			else{

				$cno = intval($key);
				// echo $cno;
				$query = mysql_query("INSERT INTO `$_POST[type]` (`cno`,`type`) VALUES ( $cno, 1)");
			}
		}
	}
	echo "<p>设置成功</p><br />";
	echo "<a href='sort_cai.php?type=" . $_POST[type] . "&action=" . $_POST[action] ."' >返回</a><br />";
}
?>