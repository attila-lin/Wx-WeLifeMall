<?php
$con = mysql_connect("hdm-062.hichina.com","name","password");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("hdm0620114_db", $con);

// 用UTF8编码查询
mysql_query("SET NAMES utf8");
?>