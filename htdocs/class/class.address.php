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
		$this->db->query($sql);
		return $this->db->fetchAll();
	}

	function editAddr($no, $address) {
		$sql = "UPDATE `$this->tblName`
				SET `address` = '$address'
				WHERE `ano` = '$no'";
		if($this->db->query($sql))
			return true;
		else
			return false;
	}

	function addAddr($id, $address) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$id','$address')";
		$this->db->query($sql);

		return $this->db->insertID();
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
		$this->db->query($sql);

		return $this->db->affectedRows();
	}
}