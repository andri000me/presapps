<?php 
  include "../connection/connect.php";

  $sql_jbt = "SELECT COUNT(*) AS total FROM jabatan";
  $r_jbt = mysqli_query($connect, $sql_jbt);
  $jbt = mysqli_fetch_assoc($r_jbt);

  $sql_kry = "SELECT COUNT(*) AS total FROM karyawan";
  $r_kry = mysqli_query($connect, $sql_kry);
  $kry = mysqli_fetch_assoc($r_kry);

  $sql_ap = "SELECT COUNT(*) AS total FROM akun_pengguna";
  $r_ap = mysqli_query($connect, $sql_ap);
  $ap = mysqli_fetch_assoc($r_ap);

  $tanggal = date("Y-m-d");
  $sql_p = "SELECT COUNT(*) AS total FROM kehadiran WHERE tanggal='$tanggal'";
  $r_p = mysqli_query($connect, $sql_p);
  $p = mysqli_fetch_assoc($r_p);
  $presensi = ($p["total"]/$kry["total"]) * 100;
  $presensi = number_format($presensi, 0, ",", ".");
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-list"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Presensi Hari Ini</span>
            <span class="info-box-number">
              <?php echo $presensi; ?>
              <small>%</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-briefcase"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Jabatan</span>
            <span class="info-box-number"><?php echo $jbt["total"]; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Karyawan</span>
            <span class="info-box-number"><?php echo $kry["total"]; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-address-card"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Akun Pengguna</span>
            <span class="info-box-number"><?php echo $ap["total"]; ?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->