<html>
  <head>
      <title>管理界面</title>
  </head>
  <body>

  欢迎登录管理界面<br />
  <a href='insert.php' >添加菜品</a> <br />
  <a href='delete.php' >删除修改菜品</a> <br />
  设置今日菜品 <br />
  <a href='setmenu.php?target=restaurant' >餐厅</a> <br />
  <a href='setmenu.php?target=vegetable' >净菜</a> <br />
  <a href='setmenu.php?target=hot' >火锅</a> <br />
  <a href='setmenu.php?target=local' >土特团</a> <br />

  <form action='login.php' method='post'>
      <input type='submit' name='action' value='logout'/>
  </form>

  </body>
</html>