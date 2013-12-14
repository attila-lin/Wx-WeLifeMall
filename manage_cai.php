<html>
  <head>
      <title></title>
  </head>
  <body>
    
    <form action='changecai.php' method='post'>

        <?
        if($_GET){
            $cno = intval($_GET);
            include( 'conn.php' );
            $query = mysql_query("SELECT * from `cai` WHERE `cno`='$cno' limit 1");
            if($row = mysql_fetch_array($query)){
                echo '<input type="hidden" value=' . $_GET[cno] . '>';
                echo 'name      <input type="text" name="cname" value="' .$row[cname] . '"/> <br />';
                echo 'price     <input type="text" name="cprice" value="' .$row[cprice] . '"/> <br />';
                echo 'pic       <input type="file" name="cpic" /> <br />';
                echo 'belifcontent <input type="text" name="belifcontent" value="' .$row[belifcontent] . '"/> <br />';
                echo 'type      <input type="text" name="type" value="' .$row[type] . '"/> <br />';
                echo "<input type='submit' name='action' value='修改'/>";
            }
        }
        ?>

    </form>

  </body>
</html>