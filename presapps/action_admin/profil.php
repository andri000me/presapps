<?php 

include "../connection/connect.php";

switch(@$_POST["mode"]){
	case "ganti_password":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		$password_lama = sha1(mysqli_real_escape_string($connect, $_POST["password_lama"]));
		$password_baru = sha1(mysqli_real_escape_string($connect, $_POST["password_baru"]));
		$kpassword_baru = sha1(mysqli_real_escape_string($connect, $_POST["kpassword_baru"]));
		$sql = "SELECT * FROM akun_pengguna WHERE nik='$nik' AND password='$password_lama'";
		$result = mysqli_query($connect, $sql);
		$cek = mysqli_num_rows($result);
		if($cek > 0){
			if($password_baru == $kpassword_baru){
				$sql2 = "UPDATE akun_pengguna SET password='$password_baru' WHERE nik='$nik'";
				$result2 = mysqli_query($connect, $sql2);
				if(!$result2){
					die("Error: ".mysqli_error($connect));
				}else{
					header("location:../admin/index.php?page=profil_saya&status=1");
				}
				mysqli_close($connect);
			}else{
				header("location:../admin/index.php?page=profil_saya&action=ganti_password&status=0");
			}
		}else{
			header("location:../admin/index.php?page=profil_saya&action=ganti_password&status=1");
		}
		break;
}

?>