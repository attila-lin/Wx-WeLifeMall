<html>
  <head>
      <title></title>
  </head>
  <body>
  	
<?
if($_GET){
	$cno = intval($_GET[cno]);
	include( 'conn.php' );
	$query = mysql_query("SELECT * from `cai` WHERE `cno`='$cno' limit 1");
	if($row = mysql_fetch_array($query)){
		echo $row[cno] . '<br />';
		echo $row[cname] . '<br />';
		echo $row[cprice] . '<br />';
		echo '<img src="caipic/' . $row[cpic] . '"  alt="" height="80" width="90" /> <br />';
		echo $row[belifcontent] . '<br />';
		echo $row[type] . '<br />';
	}
}
?>

  </body>
</html>