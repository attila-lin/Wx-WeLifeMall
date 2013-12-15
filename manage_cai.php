<?
session_start();
$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");
?>

<html>
  <head>
      <title></title>
  </head>
  <body>
    
    <form action='changecai.php' method='post'>

        <?
        if($_GET){
            $cno = intval($_GET[cno]);
            include( 'conn.php' );
            $query = mysql_query("SELECT * from `cai` WHERE `cno`='$cno' limit 1");
            if($row = mysql_fetch_array($query)){
                echo '<input type="hidden" name="cno" value=' . $_GET[cno] . '>';
                echo 'name      <input type="text" name="cname" value="' .$row[cname] . '"/> <br />';
                echo 'price     <input type="text" name="cprice" value="' .$row[cprice] . '"/> <br />';
                echo 'belifcontent <input type="text" name="belifcontent" value="' .$row[belifcontent] . '"/> <br />';
                echo 'type      <input type="text" name="type" value="' .$row[type] . '"/> <br />';
                echo "<input type='submit' name='action' value='修改'/><br /><br />";
            }
        }
        ?>

    </form>

    <form enctype="multipart/form-data" action="upload.php" method="post">  
    请选择文件： <br>  
        <input type="file" name="upload_file" ><br> 
        <input type="hidden" name="cno" value=<?php echo '"' . $cno . '"' ?> > 
        <input type="submit" value="提交文件">  
    </form>  

    <a href='delete.php'>返回</a><br />

  </body>
</html>