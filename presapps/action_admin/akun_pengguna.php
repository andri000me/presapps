<?php 

include "../connection/connect.php";

switch(@$_POST["mode"]){
	case "add":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		$password = sha1(mysqli_real_escape_string($connect, $_POST["password"]));
		$kpassword = sha1(mysqli_real_escape_string($connect, $_POST["kpassword"]));
		$hak_akses = mysqli_real_escape_string($connect, $_POST["hak_akses"]);
		$sql = "SELECT * FROM akun_pengguna WHERE nik='$nik'";
		$result = mysqli_query($connect, $sql);
		$cek = mysqli_num_rows($result);
		if($cek > 0){
			header("location: ../admin/index.php?page=akun_pengguna&action=add&status=1");
		}else{
			if($password == $kpassword){
				$sql2 = "INSERT INTO akun_pengguna VALUES('$nik', '$password', '$hak_akses')";
				$result2 = mysqli_query($connect, $sql2);
				if(!$result){
					die("Error: ".mysqli_error($connect));
				}else{
					header("location: ../admin/index.php?page=akun_pengguna&status=1");
				}
			}else{
				header("location: ../admin/index.php?page=akun_pengguna&action=add&status=0");
			}
		}
		break;

	case "edit":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		$hak_akses = mysqli_real_escape_string($connect, $_POST["hak_akses"]);
		$sql = "UPDATE akun_pengguna SET hak_akses='$hak_akses' WHERE nik='$nik'";
		$result = mysqli_query($connect, $sql);
		if(!$result){
			die("Error: ".mysqli_error($connect));
		}else{
			header("location: ../admin/index.php?page=akun_pengguna&status=2");
		}
		break;

	case "cpass":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		$password = sha1(mysqli_real_escape_string($connect, $_POST["password"]));
		$kpassword = sha1(mysqli_real_escape_string($connect, $_POST["kpassword"]));
		$hak_akses = mysqli_real_escape_string($connect, $_POST["hak_akses"]);
		if($password == $kpassword){
			$sql = "UPDATE akun_pengguna SET password='$password', hak_akses='$hak_akses' WHERE nik='$nik'";
			$result = mysqli_query($connect, $sql);
			if(!$result){
				die("Error: ".mysqli_error($connect));
			}else{
				header("location: ../admin/index.php?page=akun_pengguna&status=3");
			}
		}else{
			header("location: ../admin/index.php?page=akun_pengguna&action=cpass&id=$nik&status=0");
		}
		break;

	default:
		$sql = "SELECT akun_pengguna.*, karyawan.nama_lengkap FROM akun_pengguna INNER JOIN karyawan ON akun_pengguna.nik = karyawan.nik";
		$result = mysqli_query($connect, $sql);
		break;
}

?>