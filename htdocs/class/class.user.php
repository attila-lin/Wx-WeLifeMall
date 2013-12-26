<?php

class user{
	private $db;
	private $tblName;
	private $fieldList;

	function user($db){
		$this->db 		= $db;
		$this->tblName = "user";
		// $this->$fieldList= array("uid", "openid", "uname", "upwd"); 
		// 暂时只要openid
		$this->fieldList= array("uid", "openid"); 
	}
/*
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
*/
	function getAllUser() {
		$sql = "SELECT * FROM `$this->tblName`";
		if($this->db->query($sql)){
			return $this->db->fetchAll();
		}
		else{
			return false;
		}
	}

	function getUser($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `uid` = '$id' limit 1";
		if($this->db->query($sql)){
			return $this->db->fetchRow();
		}
		else{
			return false;
		}
	}

	function findUser($openid) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `openid` = '$openid' limit 1";
		if($this->db->query($sql)){
			return $this->db->fetchRow();
		}
		else{
			return false;
		}
	}
/*
	function editUser($id, $pwd)
	{
		$sql = "UPDATE `$this->tblName`
				SET `upwd` = '$pwd'
				WHERE `uid` = '$id'";
		if($this->db->query($sql))
			return true;
		else
			return false;
	}
*/
	function addUser($openid) {
		$sql = "SELECT `uid` FROM `$this->tblName` 
				WHERE `openid` = '$openid'";

		if($this->db->query($sql)){
			if($this->db->recordCount())
			{
				return -1;
			}
			$sql = "INSERT INTO `$this->tblName` 
					VALUES(null,'$openid')";
			return $this->db->query($sql) ? $this->db->insertID() : false;
		}
		else{
			return false;
		}
	}

	function delUser($id) {
		// 条件判断格式
		if(is_array($id)) {
			$tmp = "IN (" . join(",", $id) . ")";
		}
		else{
			$tmp = "= $id";
		}
		$sql = "DELETE FROM `$this->tblName` WHERE uid " . $tmp ;
		return $this->db->query($sql) ? $this->db->affectedRows() : false;
	}

	function getAddressClass(){
		$address = new address($this->db);
		return $address;
	}

	function getPhoneClass(){
		$phone = new phone($this->db);
		return $phone;
	}
}