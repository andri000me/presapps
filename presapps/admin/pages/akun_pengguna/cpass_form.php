<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Akun Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?page=akun_pengguna">Akun Pengguna</a></li>
          <li class="breadcrumb-item active">Edit Akun</li>
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
      if($status == 0){
  ?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Konfirmasi password tidak sama!
  </div>
  <?php 
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Akun</h3>
    </div>
    <form action="../action_admin/akun_pengguna.php" method="POST">
      <input type="hidden" name="mode" value="cpass">
      <input type="hidden" name="nik" value="<?php echo $_GET['id']; ?>">
       <?php 
        include "../connection/connect.php";
        $id = $_GET["id"];
        $sql = "SELECT akun_pengguna.nik, karyawan.nama_lengkap, akun_pengguna.password, akun_pengguna.hak_akses FROM akun_pengguna INNER JOIN karyawan ON akun_pengguna.nik = karyawan.nik WHERE akun_pengguna.nik='$id'";
        $result = mysqli_query($connect, $sql);
        $i = mysqli_fetch_assoc($result);
      ?>
      <div class="card-body">
      	<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="nik" class="col-sm-4 control-label">NIK</label>
              <div class="col-sm-8">
                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" disabled="" value="<?php echo $i['nik']; ?>">
              </div>
            </div>
    			</div>
    		</div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row">
              <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap</label>
              <div class="col-sm-8">
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" disabled="" value="<?php echo $i['nama_lengkap']; ?>">
              </div>
            </div>
          </div>
        </div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="password" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
              </div>
            </div>
    			</div>
    		</div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row">
              <label for="kpassword" class="col-sm-4 control-label">Konfirmasi Password</label>
              <div class="col-sm-8">
                <input type="password" name="kpassword" class="form-control" id="password" placeholder="Konfirmasi Password">
              </div>
            </div>
          </div>
        </div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="hak_akses" class="col-sm-4 control-label">Hak Akses</label>
              <div class="col-sm-8">
                <select name="hak_akses" class="form-control custom-select">
  							  <option value="" <?php if($i["hak_akses"] == ""){ echo "selected"; } ?>>Pilih Hak Akses</option>
  							  <option value="Admin" <?php if($i["hak_akses"] == "Admin"){ echo "selected"; } ?>>Admin</option>
  							  <option value="Staff" <?php if($i["hak_akses"] == "Staff"){ echo "selected"; } ?>>Staff</option>
  							</select>
              </div>
            </div>
    			</div>
    		</div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
        	<div class="col-sm-6">
        		<a href="index.php?page=akun_pengguna&action=edit&id=<?php echo $i['nik']; ?>" class="btn btn-default">
        			<i class="nav-icon fas fa-arrow-left"></i> Batal
        		</a>
        		<button type="submit" class="btn btn-primary float-right">
        			<i class="fas fa-paper-plane"></i> Simpan
        		</button>
        	</div>
        </div>
      </div>
      <!-- /.card-footer-->
    </form>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->