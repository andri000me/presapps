<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Jabatan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?page=jabatan">Jabatan</a></li>
          <li class="breadcrumb-item active">Tambah Jabatan</li>
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
      <h3 class="card-title">Tambah Jabatan</h3>
    </div>
    <form action="../action_admin/jabatan.php" method="POST">
      <input type="hidden" name="mode" value="add">
      <div class="card-body">
    		<div class="row">
    			<div class="col-sm-4">
    				<div class="form-group row">
              <label for="nama_jabatan" class="col-sm-5 control-label">Nama Jabatan</label>
              <div class="col-sm-7">
                <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" placeholder="Nama Jabatan" required="">
              </div>
            </div>
    			</div>
    		</div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <div class="row">
        	<div class="col-sm-4">
        		<a href="index.php?page=jabatan" class="btn btn-default">
        			<i class="nav-icon fas fa-arrow-left"></i> Batal
        		</a>
        		<button type="submit" class="btn btn-primary float-right">
        			<i class="nav-icon fas fa-paper-plane"></i> Simpan
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