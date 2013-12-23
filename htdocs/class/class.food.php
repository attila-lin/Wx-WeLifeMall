<?php

class food{
	private $db;
	private $tblName;
	private $fieldList;

	function food($db ,$category){
		$this->db 		= $db;
		// chinese western fruit dessert
		$this->tblName = $category;
		$this->fieldList= array("id", "name", "price", "pic", "content", "recommond");
	}

	function getFood($id) {
		$sql = "SELECT * FROM `$this->tblName` 
				WHERE `id` = '$id'";
		$this->db->query($sql);
		return $this->db->fetchRow();
	}

	function editFood($id, $name, $price, $category, $pic, $content) {
		$sql = "UPDATE `$this->tblName`
				SET `name` = '$name', `price` = '$price', 
				    `pic` = '$pic', `content` = '$content', 
				WHERE `id` = '$id'";
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
		$sql = "DELETE FROM `$this->tblName` WHERE `id` " . $tmp ;
		$this->db->query($sql);

		return $this->db->affectedRows();
	}
}