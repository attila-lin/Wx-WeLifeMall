<?
//  防止全局变量造成安全隐患
$mno = false;
$mid = false;
//  启动会话，这步必不可少
session_start();

$url="index.php";
if(!isset($_SESSION['mno']))
  header("Location: $url");

?>

<html>
  <head>
      <title>添加菜品</title>
  </head>
  <body>
  	
		<form action='adddel_cai.php' method='post'>
			name <input type='text' name='cname' /> <br />
			price <input type='text' name='cprice' /> <br />
			<!-- pic <input type='file' name='cpic' /> <br /> -->
			belifcontent <input type='text' name='belifcontent' /> <br />
			type <input type='text' name='type' /> <br />
      <input type='submit' name='action' value='add'/>
  	</form>

  </body>
</html>