<?php

class admin{
    private $db;
    private $tblName;
    private $fieldList;

    function __construct($datebase){
        $this->db       = $datebase;
        $this->tblName  = "admin";
        $this->fieldList= array("aid", "aname", "apwd");
    }

    function login($name, $pwd){
        $sql = "SELECT `aid` from `$this->tblName` where `aname`='$name' and `apwd`='$pwd' limit 1";
        $this->db->query($sql);
        if ($record = $this->db->fetchRow())
        {   // 
            $_SESSION['isLogin']    = true;
            $_SESSION['aid']        = $record['aid'];
            $_SESSION['aname']      = $name;
            return true;
        }
        else
            return false;
    }

    function isLogin() {
        return isset($_SESSION['isLogin'])  ? true : false;
    }

    function logout() {
        unset($_SESSION['isLogin']);
        unset($_SESSION['aid']);
        unset($_SESSION['aname']);
        //  这种方法是销毁整个 Session 文件
        session_destroy();
        return true;
    }

    function addAdmin($name, $pwd) {

        $sql = "SELECT `aid` FROM `$this->tblName` 
                WHERE `aname` = '$name'";

        $this->db->query($sql);
        if($this->db->recordCount())
        {
            return -1;
        }
        $sql = "INSERT INTO `$this->tblName` 
                VALUES(null,'$name','$pwd')";
        $this->db->query($sql);

        return $this->db->insertID();
    }

    function delAdmin($id) {
        // 条件判断
        if(is_array($id)) {
            $tmp = "IN (" . join(",", $id) . ")";
        }
        else{
            $tmp = "= $id";
        }
        $sql = "DELETE FROM `$this->tblName` WHERE aid " . $tmp ;
        $this->db->query($sql);

        return $this->db->affectedRows();
    }
}