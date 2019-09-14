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
          <li class="breadcrumb-item active">Buat Akun</li>
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
  <?php }elseif($status == 1){ ?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Akun sudah terdaftar!
  </div>
  <?php 
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Buat Akun</h3>
    </div>
    <form action="../action_admin/akun_pengguna.php" method="POST">
      <input type="hidden" name="mode" value="add">
      <div class="card-body">
      	<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="nik" class="col-sm-4 control-label">NIK</label>
              <div class="col-sm-8">
                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" required="">
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="password" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="kpassword" class="col-sm-4 control-label">Konfirmasi Password</label>
              <div class="col-sm-8">
                <input type="password" name="kpassword" class="form-control" id="kpassword" placeholder="Konfirmasi Password" required="">
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
  							  <option value="">Pilih Hak Akses</option>
  							  <option value="Admin">Admin</option>
  							  <option value="Staff">Staff</option>
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
        		<a href="index.php?page=akun_pengguna" class="btn btn-default">
        			<i class="fas fa-arrow-left"></i> Batal
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