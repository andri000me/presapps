<?php 

include "../connection/connect.php";

switch(@$_POST["mode"]){

	case "add":
		$sql = "SELECT nomor FROM hitung WHERE label='nik'";
		$result = mysqli_query($connect, $sql);
		$i = mysqli_fetch_assoc($result);
		$nama_lengkap = mysqli_real_escape_string($connect, $_POST["nama_lengkap"]);
		$jenis_kelamin = mysqli_real_escape_string($connect, $_POST["jenis_kelamin"]);
		$id_jabatan = mysqli_real_escape_string($connect, $_POST["id_jabatan"]);
		$no_hp = mysqli_real_escape_string($connect, $_POST["no_hp"]);
		$alamat = mysqli_real_escape_string($connect, $_POST["alamat"]);
		$nik = $id_jabatan.date("y").$i["nomor"];
		$sql = "UPDATE hitung SET nomor = nomor+1 WHERE label='nik'";
		$result = mysqli_query($connect, $sql);
		$sql = "INSERT INTO karyawan(nik, nama_lengkap, jenis_kelamin, id_jabatan, no_hp, alamat) VALUES('$nik', '$nama_lengkap', '$jenis_kelamin', '$id_jabatan', '$no_hp', '$alamat')";
		$result = mysqli_query($connect, $sql);
		if(!$result){
			die("Error: ".mysqli_error($connect));
		}else{
			header("location:../staff/index.php?page=karyawan&status=1");
		}
		mysqli_close($connect);
		break;

	case "edit":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		$nama_lengkap = mysqli_real_escape_string($connect, $_POST["nama_lengkap"]);
		$jenis_kelamin = mysqli_real_escape_string($connect, $_POST["jenis_kelamin"]);
		$id_jabatan = mysqli_real_escape_string($connect, $_POST["id_jabatan"]);
		$no_hp = mysqli_real_escape_string($connect, $_POST["no_hp"]);
		$alamat = mysqli_real_escape_string($connect, $_POST["alamat"]);
		$sql = "UPDATE karyawan SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', id_jabatan='$id_jabatan', no_hp='$no_hp', alamat='$alamat' WHERE nik='$nik'";
		$result = mysqli_query($connect, $sql);
		if(!$result){
			die("Error: ".mysqli_error($connect));
		}else{
			header("location:../staff/index.php?page=karyawan&status=2");
		}
		mysqli_close($connect);
		break;

	default:
		$sql = "SELECT * FROM karyawan";
		$result = mysqli_query($connect, $sql);
		break;

}

?>