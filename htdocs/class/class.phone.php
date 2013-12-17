<?php

class phone{
	private $db;
	private $tblName;
	private $fieldList;

	function phone($db){
		$this->$db 		= $db;
		$this->$tblName = "phone";
		$this->$fieldList= array("pno", "uid", "phone");
	}

	function getPhone($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `uid` = '$id'";
		$this->db->query($sql);
		return $this->db->fetchAll();
	}

	function editPhone($no, $phone) {
		$sql = "UPDATE `$this->tblName`
				SET `phone` = '$phone'
				WHERE `pno` = '$no'";
		if($this->db->query($sql))
			return true;
		else
			return false;
	}

	function addPhone($id, $phone) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$id','$phone')";
		$this->db->query($sql);

		return $this->db->insertID();
	}

	function delPhone($no) {
		// 条件判断
		if(is_array($no)) {
			$tmp = "IN (" . join(",", $no) . ")";
		}
		else{
			$tmp = "= $no";
		}
		$sql = "DELETE FROM `$this->tblName` WHERE pno " . $tmp ;
		$this->db->query($sql);

		return $this->db->affectedRows();
	}
}