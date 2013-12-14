<?
// Array ( [1] => on [type] => vegetable [action] => recommond )
if($_POST[type] && $_POST[action]){
	// print_r($_POST);
	

	if($_POST[type] == 'recommond'){
		foreach ($_POST as $key => $value) {
			echo $key;
			if($key == 'type' || $key == 'action')
				continue;
			else{
				include('conn.php');
				$cno = intval($key);
				echo "string";
				$query = mysql_query("INSERT INTO '$_POST[type]' (`cno`,`type`) VALUES ( '$cno', 0)");
			}
		}
	}
	elseif($_POST[type] == 'normal'){
		foreach ($_POST as $key => $value) {
			if($key == 'type' || $key == 'action')
				continue;
			else{
				include('conn.php');
				$cno = intval($key);
				$query = mysql_query("INSERT INTO '$_POST[type]' (`cno`,`type`) VALUES ( '$cno', 1)");
			}
		}
	}
	echo "<p>设置成功</p><br />";
	echo "<a href='sort_cai.php?type=" . $_POST[type] . "&action=" . $_POST[action] ."' >返回</a><br />";
}
?>