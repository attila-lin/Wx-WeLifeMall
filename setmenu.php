<HTML>                          
	<HEAD>                         
		<TITLE></TITLE>          
	</HEAD> 
	<?if ($_GET[target]) {
		$target = $_GET[target];
	}
	?>

    <a href=<? echo '"sort_cai.php?target=' . $target . '&type=recommond"'?> target="test">设置推荐菜单</a><br />
    <a href=<? echo '"sort_cai.php?target=' . $target . '&type=normal"'?> target="test">设置菜单</a><br />
    <iframe src="" id="test" width="800" height="400"  scrolling="yes" frameborder="1">
    </iframe>
    <br />
    <a href='main.php'>返回</a>
    
</HTML>