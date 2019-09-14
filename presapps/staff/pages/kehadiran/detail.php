<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kehadiran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?page=kehadiran">Kehadiran</a></li>
          <li class="breadcrumb-item active">Detail Kehadiran</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Detail Kehadiran</h3>
    </div>
    <?php 
      include "../connection/connect.php";
      $id = $_GET["id"];
      $sql = "SELECT kehadiran.id_kehadiran, kehadiran.nik, karyawan.nama_lengkap, jabatan.nama_jabatan, kehadiran.tanggal, kehadiran.jam_datang, kehadiran.jam_pulang, detail_kehadiran.jam_kerja
              FROM kehadiran INNER JOIN karyawan ON kehadiran.nik = karyawan.nik 
              INNER JOIN jabatan ON karyawan.id_jabatan = jabatan.id_jabatan 
              INNER JOIN detail_kehadiran ON kehadiran.id_kehadiran = detail_kehadiran.id_kehadiran
              WHERE kehadiran.id_kehadiran = '$id' ORDER BY kehadiran.id_kehadiran DESC";
      $result = mysqli_query($connect, $sql);
      $i = mysqli_fetch_assoc($result);
    ?>
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="tanggal" class="col-sm-4 control-label">Tanggal</label>
            <div class="col-sm-8">
              : <?php echo $i["tanggal"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="nik" class="col-sm-4 control-label">NIK</label>
            <div class="col-sm-8">
              : <?php echo $i["nik"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap</label>
            <div class="col-sm-8">
              : <?php echo $i["nama_lengkap"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="jam_datang" class="col-sm-4 control-label">Jam Datang</label>
            <div class="col-sm-8">
              : <?php echo $i["jam_datang"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="jam_pulang" class="col-sm-4 control-label">Jam Pulang</label>
            <div class="col-sm-8">
              : <?php echo $i["jam_pulang"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="jam_kerja" class="col-sm-4 control-label">Jam Kerja</label>
            <div class="col-sm-8">
              : <?php echo $i["jam_kerja"]; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-6">
          <a href="index.php?page=kehadiran" class="btn btn-default">
            <i class="fas fa-arrow-left"></i> Batal
          </a>
        </div>
      </div>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->