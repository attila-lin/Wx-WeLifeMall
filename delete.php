<html>
  <head>
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
  	</body>
</html>