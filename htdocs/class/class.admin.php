<?php

class admin{
	private $tblName;
	private $fieldList;

	function admin(){
		$tblName = "admin";
		$fieldList = array("aid", "aname", "apwd");
	}

	function login($name, $pwd){
		$sql = "SELECT `aid` from `this->$tblName` where `aname`='$name' and `apwd`='$pwd' limit 1";
		mysql_query($sql);
	}
}