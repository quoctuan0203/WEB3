<?php 
class admin extends DB{
	
	
	function ktadmin($email,$pass){
		$arr = array(":T"=> "$email",":P"=>"$pass");
		$sql ="select * from admin where taikhoan = :T and matkhau = :P";
		return $this->query($sql, $arr);
	}
	
}
?>