<?
if($_GET){
	include 'conn.php';
	$target = $_GET[target];
	switch ($target) {
		case 'restaurant':
			$target = '餐厅';
			break;
		case 'vegetable':
			$target = '净菜';
			break;
		case 'hot':
			$target = '火锅';
			break;
		case 'local':
			$target = '土特团';
			break;
		default:
			break;
	}
	$query = mysql_query("SELECT * from `cai` WHERE `type` = '$target' ");
	// $get = array();

	echo "<form action='setsql.php' method='post'>";
	while($row = mysql_fetch_array($query)){
		// array_push($get,$row);
		echo '<input type="checkbox" name="' . $row[cno] . '" /><a href="cai.php?cno=' . $row[cno] . '">' . $row[cname] . '</a> <br />';
	}
	$type = $_GET[type];
	echo "<input type='hidden' name='type' value='" . $type . "'>";
	echo "<input type='submit' name='action' value='set'>";
	echo "</form>";
	// print_r($get);
}
?>