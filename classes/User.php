<?php
class User extends Application {
	private $_table = "employee";
	private $_table2 = "teretory";
	public $_id;
	public $_name;
	public $_type;
	public $_teretoryId;
	public $_teritory_name;



public function isUser($email, $password) {
	//$password = Login::string2hash($password);
	$sql = "SELECT * FROM `{$this->_table}`
			WHERE `username` = '".$this->db->escape($email)."'
			AND `password` = '".$this->db->escape($password)."' AND
			`active` = 1";
	$result = $this->db->fetchOne($sql);
	if (!empty($result)) {
		$this->_id = $result['userId'];
		$this->_name = $result['name'];
		$this->_type = $result['type'];
		$this->_teretoryId = $result['teretoryId'];
        $sql2 = "SELECT * FROM `{$this->_table2}`
		WHERE `TeretoryId` = '".$this->_teretoryId."'";
		$result2 = $this->db->fetchOne($sql2);
		if (!empty($result2)) {
        $this->_teritory_name =  $result2['TeretoryName'];
		}
		return true;

	}
	return false;
}
	public function getByUsername($username = null) {
		if (!empty($username)) {
			$sql = "SELECT `userId` FROM `{$this->_table}`
					WHERE `username` = '".$this->db->escape($username)."'
					";
			return $this->db->fetchOne($sql);
		}
	}



}