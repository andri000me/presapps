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
    <i class="fas fa-info-circle"></i> Password lama tidak sesuai!
  </div>
  <?php 
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Ganti Password</h3>
    </div>
    <form action="../action_staff/profil.php" method="POST">
      <input type="hidden" name="mode" value="ganti_password">
      <input type="hidden" name="nik" value="<?php echo $_SESSION['nik']; ?>">
      <div class="card-body">
      	<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="password_lama" class="col-sm-4 control-label">Password Lama</label>
              <div class="col-sm-8">
                <input type="password" name="password_lama" class="form-control" id="password_lama" placeholder="Password Lama">
              </div>
            </div>
    			</div>
    		</div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row">
              <label for="password_baru" class="col-sm-4 control-label">Password Baru</label>
              <div class="col-sm-8">
                <input type="password" name="password_baru" class="form-control" id="password_baru" placeholder="Password Baru">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group row">
              <label for="kpassword_baru" class="col-sm-4 control-label">Konfirmasi Password Baru</label>
              <div class="col-sm-8">
                <input type="password" name="kpassword_baru" class="form-control" id="kpassword_baru" placeholder="Konfirmasi Password Baru">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
        	<div class="col-sm-6">
            <a href="index.php?page=profil_saya" class="btn btn-default">
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