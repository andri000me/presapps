<?php 

session_start();

include "connection/connect.php";

$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
$password = sha1(mysqli_real_escape_string($connect, $_POST["password"]));
$sql = "SELECT * FROM akun_pengguna WHERE nik='$nik' AND password='$password'";
$result = mysqli_query($connect, $sql);
$cek = mysqli_num_rows($result);

if($cek > 0){
	$i = mysqli_fetch_assoc($result);
	if($i["hak_akses"] == "Admin"){
		$_SESSION["nik"] = $nik;
		$_SESSION["hak_akses"] = "Admin";
		header("location: admin/index.php");
	}elseif($i["hak_akses"] == "Staff"){
		$_SESSION["nik"] = $nik;
		$_SESSION["hak_akses"] = "Staff";
		header("location: staff/index.php");
	}else{
		header("location: login.php?status=0");
	}
}else{
	header("location: login.php?status=0");
}

?>