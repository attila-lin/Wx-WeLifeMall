<?
if($_POST[action] == 'add'){
    // print_r($_POST);
    include( 'conn.php' );
    $query = mysql_query("INSERT INTO `cai` (`cname`,`cprice`,`cpic`,`belifcontent`,`type`) VALUES ('$_POST[cname]','$_POST[cprice]','NULL','$_POST[belifcontent]','$_POST[type]' ) ");
    echo '
    <html>
    <head>
        <title>上传设置图片</title>
    </head>
    <body>
    <form enctype="multipart/form-data" action="upload.php" method="post">  
    请选择文件： <br>  
        <input name="upload_file" type="file"><br>  
        <input type="submit" value="提交文件">  
    </form>  
    
    </body>
    </html>

    ';    
}
elseif($_POST[action] == 'del'){
    print_r($_POST);
}
?>