<?php 

include "../connection/connect.php";

switch(@$_POST["mode"]){

	case "add":
		$nama_jabatan = mysqli_real_escape_string($connect, $_POST["nama_jabatan"]);
		$sql = "INSERT INTO jabatan(nama_jabatan) VALUES('$nama_jabatan')";
		$result = mysqli_query($connect, $sql);
		if(!$result){
			die("Error: ".mysqli_error($connect));
		}else{
			header("location: ../admin/index.php?page=jabatan&status=1");
		}
		break;

	case "edit":
		$id = mysqli_real_escape_string($connect, $_POST["id_jabatan"]);
		$nama_jabatan = mysqli_real_escape_string($connect, $_POST["nama_jabatan"]);
		$sql = "UPDATE jabatan SET nama_jabatan='$nama_jabatan' WHERE id_jabatan='$id'";
		$result = mysqli_query($connect, $sql);
		if(!$result){
			die("Error: ".mysqli_error($connect));
		}else{
			header("location: ../admin/index.php?page=jabatan&status=2");
		}
		break;

	default:
		$sql = "SELECT * FROM jabatan";
		$result = mysqli_query($connect, $sql);
		break;

}

?>