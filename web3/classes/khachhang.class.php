<?php 
class khachhang extends DB{
	function getAll_KH(){
		return $this->query("select * from khachhang");
	}
	function getKhachHang($email){
		$arr = array(":T"=> "$email");
		$sql ="select * from theloai where email = :T ";
		return $this->query($sql, $arr);
	}
	function insertKhachHang($email,$matkhau,$tenkh,$diachi,$sdt,$binhluan=''){
		$arr = array(":M"=> "$email", ":MK"=>"$matkhau", ":T"=>"$tenkh", ":DC"=>"$diachi", ":SDT"=>"$sdt", ":BL"=>"$binhluan");
		$sql="insert into khachhang(email, matkhau, tenkhachhang, diachi, sodt, binhluan) ";
		$sql .=" values(:M,:MK,:T,:DC,:SDT,:BL)";
		$stm = $this->query($sql, $arr);
	}
	function ktkh1($email,$pass){
		$arr = array(":E"=> "$email",":P"=> "$pass");
		$sql="select * from khachhang where email = :E and matkhau = :P ";
		$stm = $this->query($sql,$arr);
		
	}
	function ktkh($email,$pass){
		$arr = array(":T"=> "$email",":P"=>"$pass");
		$sql ="select * from khachhang where email = :T and matkhau = :P";
		return $this->query($sql, $arr);
	}
	function updateTheLoai($matheloai,$tentheloai){
		$arr = array(":M"=> "$matheloai", ":T"=>"$tentheloai");
		$sql="update theloai set tentheloai=:T where matheloai=:M";
		$stm = $this->query($sql, $arr);
	}
}
?>