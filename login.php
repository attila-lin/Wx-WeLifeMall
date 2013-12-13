<?

// print_r($_POST);
// print_r($_POST['action']);

//********************************
//以下部分用来 登陆
//********************************
if($_POST['action'] == "login"){

    
    $username = $_POST["name"];
    $password =  $_POST["pass"];

    include( 'conn.php' );
    
    // $query = mysql_query("SELECT `mpassword` FROM `manager` WHERE `mid` LIKE '" . mysql_escape_string($username) . "';");

    // $query = mysql_query("select mid from manager " 
    //                         ."where mid = '$username' and mpassword = '$password'") or die("SQL语句执行失败"); 
    // print_r($username);
    // print_r($password);

    $query = mysql_query("SELECT `mno`,`mid` from `manager` where `mid`='$username' and `mpassword`='$password' limit 1");
    

    //判断用户是否存在，密码是否正确 
    if($row = mysql_fetch_array($query)) 
    { 
        // print_r($row);
        session_start(); //标志Session的开始 

        $_SESSION['mno'] = $row['mno']; 
        $_SESSION['mid'] = $row['mid']; 

        echo "
        <html>
        <head>
            <title>管理界面</title>
        </head>
        <body>
        
        欢迎登录管理界面<br />
        <a href='insert.php' >添加菜品</a> <br />
        设置今日菜品
        <a href='.php' >厨房</a> <br />
        <a href='.php' >蔬菜</a> <br />
        <a href='.php' >荤菜</a> <br />
        <a href='.php' >水果</a> <br />

        <form action='login.php' method='post'>
            <input type='submit' name='action' value='logout'/>
        </form>

        </body>
        </html>
        ";
    } 
    else //如果用户名和密码不正确，则输出错误 
    { 
        echo "<html><head><title>login failed</title></head><body>";
        echo "<a href='loginin.php' href='main.php'>用户名或密码错误</a>"; 
        echo "</body></html>";
    } 

}


//********************************
//以下部分用来 注销登录
//********************************

if($_POST['action'] == "logout"){
    unset($_SESSION['mno']);
    unset($_SESSION['mid']);
    echo '注销登录成功！点击此处 <a href="loginin.php">登录</a>';
    exit;
}

?>
