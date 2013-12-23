<?php

class order{
	private $db;
	private $tblName;
	private $fieldList;

	function order($db){
		$this->$db 		= $db;
		$this->$tblName = "order";
		$this->$fieldList= array("oid", "uid", "fids", "time", "price", "ano", "pno", "status");
	}

	function getOrder($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `oid` = '$id'";
		$this->db->query($sql);
		return $this->db->fetchRow();
	}

	function editOrder($id, $status) {
		$sql = "UPDATE `$this->tblName`
				SET `status` = '$status'
				WHERE `oid` = '$id'";
		if($this->db->query($sql))
			return true;
		else
			return false;
	}

	function addOrder($uid, $fids, $time, $price, $ano, $pno, $status=0) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$uid', '$fids', '$time', '$price', '$ano', '$pno', '$status')";
		$this->db->query($sql);

		return $this->db->insertID();
	}

	function delOrder($id) {
		// 条件判断
		if(is_array($id)) {
			$tmp = "IN (" . join(",", $id) . ")";
		}
		else{
			$tmp = "= $id";
		}
		$sql = "DELETE FROM `$this->tblName` WHERE `fid` " . $tmp ;
		$this->db->query($sql);

		return $this->db->affectedRows();
	}
}