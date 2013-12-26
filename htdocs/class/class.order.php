<?php



class order{
	private $db;
	private $tblName;
	private $fieldList;

	function order($db){
		$this->db 		= $db;
		$this->tblName = "order";
		$this->fieldList= array("oid", "uid", "chinese", "western", "fruit", "dessert", "time", "price", "ano", "pno", "status");
	}

	// $fidsstring = "1:2|2:3|3:3"
	/*
	function getFidArray($fidsstring){ 
		$fids = array( 1 => array(), 2 => array(), 3 => array(), 4 => array());
		// print_r($fidsstring);
		$fidstring = split("\|", $fidsstring);
		// print_r($fidstring);
		foreach ($fidstring as $key => $value) {  // $value = "1:2"
			$fid = split(":", $value);
			switch (intval($fid[0])) {				// $fid[0] = 1 2 3
			 	case 1:
			 		array_push($fids[1], intval($fid[1]) );  // $fid[1] = 2 
			 		break;
			 	case 2:
			 		array_push($fids[2], intval($fid[1]) );  // $fid[1] =   3
			 		break;
			 	case 3:
			 		array_push($fids[3], intval($fid[1]) );  // $fid[1] =     3
			 		break;
			 	case 4:
			 		array_push($fids[4], intval($fid[1]) );  
			 		break;
			 	default:
			 		break;
			 }
		}
		// print_r($fids);
		return $fids;
	}
	*/

	function getAllOrder() {
		$sql = "SELECT * FROM `$this->tblName`";
		$this->db->query($sql);
		return $this->db->fetchAll();
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

	function addOrder($uid, $chinese, $western, $fruit, $dessert, $time, $price, $ano, $pno, $status=0) {
		$sql = "INSERT INTO `$this->tblName` 
				VALUES(null,'$uid', '$chinese', '$western', '$fruit', '$dessert', '$time', '$price', '$ano', '$pno', '$status')";
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
		$sql = "DELETE FROM `$this->tblName` WHERE `oid` " . $tmp ;
		$this->db->query($sql);

		return $this->db->affectedRows();
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