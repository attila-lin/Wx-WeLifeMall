<?
session_start();
$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");


if($_GET){
	include 'conn.php';

	switch ($_GET[type]) {
		case 'restaurant':
			$type = '餐厅';
			break;
		case 'vegetable':
			$type = '净菜';
			break;
		case 'hot':
			$type = '火锅';
			break;
		case 'local':
			$type = '土特团';
			break;
		default:
			break;
	}

	switch ($_GET[action]) {
		case 'recommond':
			$action = '设置推荐';
			break;
		case 'normal':
			$action = '设置';
			break;
		default:
			break;
	}
	$query = mysql_query("SELECT * from `cai` WHERE `type` = '$type' ");
	// $get = array();
	
	echo $type . $action . "<br />";

	echo "<form action='setsql.php' method='post'>";
	while($row = mysql_fetch_array($query)){
		// array_push($get,$row);
		echo '<input type="checkbox" name="' . $row[cno] . '" /><a href="cai.php?cno=' . $row[cno] . '">' . $row[cname] . '</a> <br />';
	}
	echo "<input type='hidden' name='type' value='" . $_GET[type] . "'>"; // 
	echo "<input type='hidden' name='action' value='" . $_GET[action] . "'>"; //
	echo "<input type='submit' value='设置'>";
	echo "</form>";
}
?>