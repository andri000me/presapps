<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?page=karyawan">Karyawan</a></li>
          <li class="breadcrumb-item active">Detail Karyawan</li>
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
      <h3 class="card-title">Detail Karyawan</h3>
    </div>
    <?php 
      include "../connection/connect.php";
      $id = $_GET["id"];
      $sql = "SELECT * FROM karyawan WHERE nik='$id'";
      $result = mysqli_query($connect, $sql);
      $i = mysqli_fetch_assoc($result);
    ?>
    <div class="card-body">
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
            <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              : <?php echo $i["jenis_kelamin"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="jabatan" class="col-sm-4 control-label">Jabatan</label>
            <div class="col-sm-8">
              <?php 
                $id = $i["id_jabatan"];
                $sql2 = "SELECT * FROM jabatan WHERE id_jabatan='$id'";
                $result2 = mysqli_query($connect, $sql2);
                $j = mysqli_fetch_assoc($result2);
              ?>
              : <?php echo $j["nama_jabatan"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="no_hp" class="col-sm-4 control-label">No. HP</label>
            <div class="col-sm-8">
              : <?php echo $i["no_hp"]; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="alamat" class="col-sm-4 control-label">Alamat</label>
            <div class="col-sm-8">
              : <?php echo $i["alamat"]; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="row">
        <div class="col-sm-6">
          <a href="index.php?page=karyawan" class="btn btn-default">
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