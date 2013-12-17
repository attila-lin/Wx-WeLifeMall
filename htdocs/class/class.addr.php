<?php

class addr{
	private $db;
	private $tblName;
	private $fieldList;

	function addr($db){
		$this->$db 		= $db;
		$this->$tblName = "addr";
		$this->$fieldList= array("uid", "address"); 
	}

	function login($name, $pwd){
		$sql = "SELECT `uid` from `this->$tblName` where `uname`='$name' and `upwd`='$pwd' limit 1";
		$this->$db->query($sql);
		if ($record = $this->db->fetchRow())
		{	// 
			$_SESSION['uisLogin'] 	= true;
			$_SESSION['uid']		= $record['uid'];
			$_SESSION['uname']		= $name;
			return true;
		}
		else
			return false;
	}

	function isLogin() {
		return isset($_SESSION['uisLogin'])	? true : false;
	}

	function logout() {
		unset($_SESSION['uisLogin']);
		unset($_SESSION['uid']);
	    unset($_SESSION['uname']);
	    //  这种方法是销毁整个 Session 文件
	    session_destroy();
	    return true;
	}

	function addaddr($name, $pwd) {
		$sql = "SELECT `uid` FROM `$this->tblName` 
				WHERE `uname` = '$name'";

		$this->db->query($sql);
		if($this->db->recordCount())
		{
			return false;
		}
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$name','$pwd')";
		$this->db->query($sql);

		return $this->db->insertID();
	}

	function deladdr($id) {
		// 条件判断
		if(is_array($id)) {
			$tmp = "IN (" . join(",", $id) . ")";
		}
		else{
			$tmp = "= $id";
		}
		$sql = "DELETE FROM `$this->tblName` WHERE uid " . $tmp ;
		$this->db->query($sql);

		return $this->db->affectedRows();
	}
}