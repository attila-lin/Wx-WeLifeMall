<?

function uploadPic(){

    $upload_file=$_FILES['upload_file']['tmp_name'];  
    $upload_file_name=$_FILES['upload_file']['name'];  

    // function updatapic($picname){
    //     include( 'conn.php' );
    //     $query = mysql_query("UPDATE cai SET `cpic` = '$picname' WHERE `cno`= '$_POST[cno]' ");
    // }


    if($upload_file){ 
        $file_size_max = 1000000;// 1M限制文件上传最大容量(bytes)  
        $store_dir = "caipic";// 上传文件的储存位置  
        $accept_overwrite = 1;//是否允许覆盖相同文件  
        // 检查文件大小  
        if ($upload_file_size > $file_size_max) {  
            echo "对不起，你的文件容量大于规定";  
            exit;  
        } 
        // 检查读写文件  
        $type = $_FILES['upload_file']['type'];
        if(strlen($upload_file_name)>=13){
            $upload_file_name = substr($upload_file_name, 0,5) . '.' . substr($type, strpos($type, '/')+1, strlen($type) );
        }
        if (file_exists($store_dir . $upload_file_name) && !$accept_overwrite) {  
            Echo "存在相同文件名的文件";  
            exit;  
        }  
        //复制文件到指定目录  
        if (!move_uploaded_file($upload_file, $store_dir . '/' . $upload_file_name)) {  
            echo "复制文件失败";  
            exit;
        }
    } 
    return $upload_file_name;

    // Echo "<p>你上传了文件:";  
    // echo $_FILES['upload_file']['name'];  
    // echo "<br>";  
    // //客户端机器文件的原名称。  
    // Echo "文件的 MIME 类型为:";  
    // echo $_FILES['upload_file']['type'];  
    // //文件的 MIME 类型，需要浏览器提供该信息的支持，例如“image/gif”。  
    // echo "<br>";  
    // Echo "上传文件大小:";  
    // echo $_FILES['upload_file']['size'];  
    // //已上传文件的大小，单位为字节。  
    // echo "<br>";  
    // Echo "文件上传后被临时储存为:";  
    // echo $_FILES['upload_file']['tmp_name'];  
    // //文件被上传后在服务端储存的临时文件名。  
    // echo "<br>";

    // $Erroe=$_FILES['upload_file']['error'];  
    // switch($Erroe){  
    //     case 0:  
    //         Echo "上传成功"; updatapic($upload_file_name);  break;  
    //     case 1:  
    //         Echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值."; break;  
    //     case 2:  
    //         Echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。"; break;  
    //     case 3:  
    //         Echo "文件只有部分被上传";break;  
    //     case 4:  
    //         Echo "没有文件被上传";break;  
    // } 

    // echo "<br /><br /><br /><br /><a href='insert.php' >继续添加</a><br />
    //         <a href='main.php'   >管理界面</a><br />
    // ";
}

// $field = explode(',', $data);
// array_walk($field, array($this, 'add_special_char'));
// $data = implode(',', $field);
/**
 * 对字段两边加反引号，以保证数据库安全
 * @param $value 数组值
 */
function add_special_char(&$value) {
    if('*' == $value || false !== strpos($value, '(') || false !== strpos($value, '.') || false !== strpos ( $value, '`')) {
        //不处理包含* 或者 使用了sql方法。
    } else {
        $value = '`'.trim($value).'`';
    }
    return $value;
}
function str_filter($str) {
    $str = htmlspecialchars ( $str );
    if (! get_magic_quotes_gpc ()) {
        $str = addslashes ( $str );
    }
    //过滤危险字符
    return preg_replace ( "/[\"\'=]|(and)|(or)|(create)|(update)|(alter)|(delete)|(insert)|(load_file)|(outfile)|(count)|(%20)|(char)/i", "", $str );
}
/*
函数名称：str_check()
函数作用：对提交的字符串进行过滤
参　　数：$var: 要处理的字符串
返 回 值：返回过滤后的字符串
*/
function str_check($str) {
    if (! get_magic_quotes_gpc ()) { // 判断magic_quotes_gpc是否打开
        $str = addslashes ( $str ); // 进行过滤
    }
    $str = str_replace ( "_", "\_", $str ); // 把 '_'过滤掉
    $str = str_replace ( "%", "\%", $str ); // 把 '%'过滤掉
    return $str;
}

/*
函数名称：post_check()
函数作用：对提交的编辑内容进行处理
参　　数：$post: 要提交的内容
返 回 值：$post: 返回过滤后的内容
*/
function post_check($post) {
    if (! get_magic_quotes_gpc ()) { // 判断magic_quotes_gpc是否为打开
        $post = addslashes ( $post ); // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
    }
    $post = str_replace ( "_", "\_", $post ); // 把 '_'过滤掉
    $post = str_replace ( "%", "\%", $post ); // 把 '%'过滤掉
    $post = nl2br ( $post ); // 回车转换
    $post = htmlspecialchars ( $post ); // html标记转换
    return $post;
}
/*
函数名称：inject_check()
函数作用：检测提交的值是不是含有SQL注射的字符，防止注射，保护服务器安全
参　　数：$sql_str: 提交的变量
返 回 值：返回检测结果，ture or false
*/
function inject_check($sql_str) {
    return eregi('select|insert|and|or|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);     // 进行过滤
}

/*
函数名称：verify_id()
函数作用：校验提交的ID类值是否合法
参　　数：$id: 提交的ID值
返 回 值：返回处理后的ID
*/
function verify_id($id=null) {
    if (!$id) { exit('没有提交参数！'); }     // 是否为空判断
    elseif (inject_check($id)) { exit('提交的参数非法！'); }     // 注射判断
    elseif (!is_numeric($id)) { exit('提交的参数非法！'); }     // 数字判断
    $id = intval($id);     // 整型化

    return   $id;
}

// $rptype = 0 表示仅替换 html标记
// $rptype = 1 表示替换 html标记同时去除连续空白字符
// $rptype = 2 表示替换 html标记同时去除所有空白字符
// $rptype = -1 表示仅替换 html危险的标记
function HtmlReplace($str, $rptype = 0) {
    $str = stripslashes ( $str );
    if ($rptype == 0) {
        $str = htmlspecialchars ( $str );
    } else if ($rptype == 1) {
        $str = htmlspecialchars ( $str );
        $str = str_replace ( "　", ' ', $str );
        $str = ereg_replace ( "[\r\n\t ]{1,}", ' ', $str );
    } else if ($rptype == 2) {
        $str = htmlspecialchars ( $str );
        $str = str_replace ( "　", '', $str );
        $str = ereg_replace ( "[\r\n\t ]", '', $str );
    } else {
        $str = ereg_replace ( "[\r\n\t ]{1,}", ' ', $str );
        $str = eregi_replace ( 'script', 'ｓｃｒｉｐｔ', $str );
        $str = eregi_replace ( "<[/]{0,1}(link|meta|ifr|fra)[^>]*>", '', $str );
    }
    return addslashes ( $str );
}
//递归ddslashes
function daddslashes($string, $force = 0, $strip = FALSE) {
    if (! get_magic_quotes_gpc () || $force) {
        if (is_array ( $string )) {
            foreach ( $string as $key => $val ) {
                $string [$key] = daddslashes ( $val, $force );
            }
        } else {
            $string = addslashes ( $strip ? stripslashes ( $string ) : $string );
        }
    }
    return $string;
}

//递归stripslashes
function dstripslashes($string) {
    if (is_array ( $string )) {
        foreach ( $string as $key => $val ) {
            $string [$key] = $this->dstripslashes ( $val );
        }
    } else {
        $string = stripslashes ( $string );
    }
    return $string;
}
/**
 * 安全过滤函数
 * @param $string 要过滤的字符串
 * @return string 返回处理过的字符串
 */
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    return $string;
}

/**
 * 使用htmlspecialchars处理字符串或数组
 * @param $obj 需要处理的字符串或数组
 * @return mixed 返回经htmlspecialchars处理过的字符串或数组
 */
function new_htmlspecialchars($string) {
    if(!is_array($string))
    return htmlspecialchars($string);
    foreach($string as $key => $val)
    $string[$key] = new_htmlspecialchars($val);
    return $string;
}

//处理禁用HTML但允许换行的内容
function TrimMsg($msg) {
    $msg = trim ( stripslashes ( $msg ) );
    $msg = nl2br ( htmlspecialchars ( $msg ) );
    $msg = str_replace ( "  ", "&nbsp;&nbsp;", $msg );
    return addslashes ( $msg );
}


?>