<?
if($_POST[action] == 'add'){
    // print_r($_POST);
    include( 'conn.php' );
    $query = mysql_query("INSERT INTO `cai` (`cname`,`cprice`,`cpic`,`belifcontent`,`type`) VALUES ('$_POST[cname]','$_POST[cprice]','NULL','$_POST[belifcontent]','$_POST[type]' ) ");
    $insertId = mysql_insert_id();
    echo '
    <html>
    <head>
        <title>上传设置图片</title>
    </head>
    <body>
    <form enctype="multipart/form-data" action="upload.php" method="post">  
    请选择文件： <br>  
        <input type="file" name="upload_file" ><br> 
        <input type="hidden" name="cno" value="' . $insertId . '" > 
        <input type="submit" value="提交文件">  
    </form>  
    
    </body>
    </html>

    ';    
}
elseif($_POST[action] == 'del'){
    // print_r($_POST);
    foreach($_POST as $key => $value){
        
        include('conn.php');
        if($key == 'action')
            continue;
        else{
            $query = mysql_query("DELETE FROM `cai` WHERE `cno` = '$key'");
        }
        // print_r($value);
    }
    echo "<p>删除成功</p><br />
    <a href='delete.php'>返回</a><br />
    ";
}
?>