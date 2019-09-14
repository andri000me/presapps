<?php 

include "../connection/connect.php";

switch(@$_POST["mode"]){
	case "presensi":
		$nik = mysqli_real_escape_string($connect, $_POST["nik"]);
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date("Y-m-d");
		$jam = date("H:i:s");

		$sql = "SELECT * FROM kehadiran WHERE nik='$nik' AND tanggal='$tanggal'";
		$result = mysqli_query($connect, $sql);
		$cek = mysqli_num_rows($result);

		if($cek > 0){
			$i = mysqli_fetch_assoc($result);
			if($i["jam_pulang"] == ""){
				echo "ID Kehadiran: ".$i["id_kehadiran"]."<br>";
				echo "NIK: ".$i["nik"]."<br>";
				echo "Tanggal: ".$i["tanggal"]."<br>";
				echo "Jam Datang: ".$i["jam_datang"]."<br>";
				echo "Jam Pulang: ".$jam."<br>";
				$id = $i["id_kehadiran"];
				$sql2 = "UPDATE kehadiran SET jam_pulang='$jam' WHERE id_kehadiran='$id'";
				$result2 = mysqli_query($connect, $sql2);
				$sql_kerja = "SELECT hitjamkerja('$id')";
				$result_kerja = mysqli_query($connect, $sql_kerja);
				$lama_kerja = mysqli_fetch_row($result_kerja);
				$jam_kerja = $lama_kerja[0];
				$sql4 = "INSERT INTO detail_kehadiran(id_kehadiran, jam_kerja) VALUES('$id', '$jam_kerja')";
				$result4 = mysqli_query($connect, $sql4);
				header("location: ../index.php?status=jam_pulang&nik=$nik");
			}else{
				header("location: ../index.php");
			}
		}else{
			$sql3 = "INSERT INTO kehadiran(nik, tanggal, jam_datang) VALUES('$nik', '$tanggal', '$jam')";
			$result3 = mysqli_query($connect, $sql3);
			echo "NIK: ".$nik."<br>";
			echo "Tanggal: ".$tanggal."<br>";
			echo "Jam Datang: ".$jam."<br>";
			echo "Jam Pulang: - <br>";
			header("location: ../index.php?status=jam_datang&nik=$nik");
		}
		break;

	default:
		$sql = "SELECT kehadiran.id_kehadiran, kehadiran.nik, karyawan.nama_lengkap, kehadiran.tanggal, kehadiran.jam_datang, kehadiran.jam_pulang FROM kehadiran INNER JOIN karyawan ON kehadiran.nik = karyawan.nik ORDER BY kehadiran.id_kehadiran DESC";
		$result = mysqli_query($connect, $sql);
		break;
}

?>