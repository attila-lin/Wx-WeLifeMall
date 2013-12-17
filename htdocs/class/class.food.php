<?php

class food{
	private $db;
	private $tblName;
	private $fieldList;

	function food($db){
		$this->$db 		= $db;
		$this->$tblName = "food";
		$this->$fieldList= array("fid", "fname", "fprice", "category", "fpic", "fcontent");
	}

	function getFood($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `fid` = '$id'";
		$this->db->query($sql);
		return $this->db->fetchRow();
	}

	function editFood($id, $name, $price, $category, $pic, $content) {
		$sql = "UPDATE `$this->tblName`
				SET `fname` = '$name', `fprice` = '$price', `category` = '$category',
				    `fpic` = '$pic', `fcontent` = '$content', 
				WHERE `fid` = '$id'";
		if($this->db->query($sql))
			return true;
		else
			return false;
	}

	function addFood($name, $price, $category, $pic, $content) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null, '$name','$price', '$category', '$pic','$content')";
		$this->db->query($sql);

		return $this->db->insertID();
	}

	function delFood($id) {
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