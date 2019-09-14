<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PresApps</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="index.php"><b>Pres</b>Apps</a>
  </div>

  <?php 

    include "connection/connect.php";

    date_default_timezone_set("Asia/Jakarta");
    $tanggal = date("Y-m-d");

    if(isset($_GET["status"])){
      $status = $_GET["status"];
      if($status == "jam_datang"){
        if(isset($_GET["nik"])){
          $nik = $_GET["nik"];
          $sql = "SELECT karyawan.nama_lengkap, kehadiran.jam_datang FROM kehadiran INNER JOIN karyawan ON kehadiran.nik = karyawan.nik WHERE kehadiran.nik='$nik' AND tanggal='$tanggal'";
          $result = mysqli_query($connect, $sql);
          $i = mysqli_fetch_assoc($result);
  ?>

  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    Selamat bekerja, <strong><?php echo $i["nama_lengkap"]; ?></strong>! (<?php echo $i["jam_datang"]; ?>)
  </div>

  <?php 

      }
    }elseif($status == "jam_pulang"){
      if(isset($_GET["nik"])){
      $nik = $_GET["nik"];
      $sql = "SELECT karyawan.nama_lengkap, kehadiran.jam_pulang FROM kehadiran INNER JOIN karyawan ON kehadiran.nik = karyawan.nik WHERE kehadiran.nik='$nik' AND tanggal='$tanggal'";
          $result = mysqli_query($connect, $sql);
          $i = mysqli_fetch_assoc($result);
  ?>

  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    Hati-hati dijalan, <strong><?php echo $i["nama_lengkap"]; ?></strong>! (<?php echo $i["jam_pulang"]; ?>)
  </div>

  <?php
      }
    }
  }

  ?>

  <!-- User name -->
  <div class="lockscreen-name">Jangan lupa presensi</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="assets/dist/img/user-avatar.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="action_admin/kehadiran.php" class="lockscreen-credentials" method="POST">
      <input type="hidden" name="mode" value="presensi">
      <div class="input-group">
        <input type="text" name="nik" class="form-control" placeholder="No. Induk Karyawan">

        <div class="input-group-append">
          <button type="submit" class="btn" data-toggle="modal" data-target="#modal-default"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Masukkan NIK Anda sebelum mulai bekerja & setelah selesai bekerja
  </div>
  <div class="lockscreen-footer text-center">
    <b>PT. Erporate Solusi Global</b>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>