<?php 

  include "../connection/connect.php";
  $nik = $_SESSION["nik"];
  $sql = "SELECT akun_pengguna.nik, karyawan.nama_lengkap FROM akun_pengguna INNER JOIN karyawan ON akun_pengguna.nik = karyawan.nik WHERE akun_pengguna.nik='$nik'";
  $result = mysqli_query($connect, $sql);
  $i = mysqli_fetch_assoc($result);

?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profil Saya</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Profil Saya</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <?php 
    if(isset($_GET["status"])){
      $status = $_GET["status"];
      if($status == 1){
  ?>
  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Password berhasil diubah.
  </div>
  <?php 
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-body">
    	<div class="row">
  			<div class="col-sm-6">
  				<div class="form-group row">
            <label for="nik" class="col-sm-4 control-label">NIK</label>
            <div class="col-sm-8">
              <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" disabled="" value="<?php echo $i["nik"]; ?>">
            </div>
          </div>
  			</div>
  		</div>
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap</label>
            <div class="col-sm-8">
              <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="NIK" disabled="" value="<?php echo $i['nama_lengkap']; ?>">
            </div>
          </div>
        </div>
      </div>
  		<div class="row">
  			<div class="col-sm-6">
  				<div class="form-group row">
            <label for="password" class="col-sm-4 control-label">Password</label>
            <div class="col-sm-8">
              <a href="index.php?page=profil_saya&action=ganti_password" class="btn btn-secondary">Ganti Password</a>
            </div>
          </div>
  			</div>
  		</div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->