<?php

class address{
	private $db;
	private $tblName;
	private $fieldList;

	function address($db){
		$this->$db 		= $db;
		$this->$tblName = "address";
		$this->$fieldList= array("ano", "uid", "address");
	}

	function getAddr($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `uid` = '$id'";
		return $this->db->query($sql) ? $this->db->fetchAll() : false;
	}

	function editAddr($no, $address) {
		$sql = "UPDATE `$this->tblName`
				SET `address` = '$address'
				WHERE `ano` = '$no'";
		return $this->db->query($sql) ? true : false;
	}

	function addAddr($id, $address) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$id','$address')";
		return $this->db->query($sql) ? $this->db->insertID() : false;
	}

	function delAddr($no) {
		// 条件判断
		if(is_array($no)) {
			$tmp = "IN (" . join(",", $no) . ")";
		}
		else{
			$tmp = "= $no";
		}
		$sql = "DELETE FROM `$this->tblName` WHERE ano " . $tmp ;
		return $this->db->query($sql) ? $this->db->affectedRows() : false;
	}
}