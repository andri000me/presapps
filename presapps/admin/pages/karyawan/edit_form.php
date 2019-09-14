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
          <li class="breadcrumb-item active">Edit Karyawan</li>
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
      <h3 class="card-title">Edit Karyawan</h3>
    </div>
    <form action="../action_admin/karyawan.php" method="POST">
      <input type="hidden" name="mode" value="edit">
      <input type="hidden" name="nik" value="<?php echo $_GET['id']; ?>">
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
                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" value="<?php echo $i['nik']; ?>" disabled="">
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="nama_lengkap" class="col-sm-4 control-label">Nama Lengkap</label>
              <div class="col-sm-8">
                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required="" value="<?php echo $i['nama_lengkap']; ?>">
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
              <div class="col-sm-8">
                <select name="jenis_kelamin" class="form-control custom-select">
                  <?php 
                    $jenis_kelamin = $i["jenis_kelamin"];
                  ?>
  							  <option value="" <?php if($jenis_kelamin == ""){ echo "selected"; } ?>>Pilih Jenis Kelamin</option>
  							  <option value="Pria" <?php if($jenis_kelamin == "Pria"){ echo "selected"; } ?>>Pria</option>
  							  <option value="Wanita" <?php if($jenis_kelamin == "Wanita"){ echo "selected"; } ?>>Wanita</option>
  							</select>
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="jabatan" class="col-sm-4 control-label">Jabatan</label>
              <div class="col-sm-8">
                <select name="id_jabatan" class="form-control custom-select">
  							  <option value="">Pilih Jabatan</option>
  							  <?php
                    $sql2 = "SELECT * FROM jabatan";
                    $result2 = mysqli_query($connect, $sql2);
                    while($j = mysqli_fetch_assoc($result2)){
                  ?>
                  <option value="<?php echo $j["id_jabatan"]; ?>" <?php if($i["id_jabatan"] == $j["id_jabatan"]){ echo "selected"; } ?>><?php echo $j["nama_jabatan"]; ?></option>
                  <?php } ?>
  							</select>
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="no_hp" class="col-sm-4 control-label">No. HP</label>
              <div class="col-sm-8">
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No. HP" required="" value="<?php echo $i['no_hp']; ?>">
              </div>
            </div>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-6">
    				<div class="form-group row">
              <label for="alamat" class="col-sm-4 control-label">Alamat</label>
              <div class="col-sm-8">
                <textarea name="alamat" id="alamat" class="form-control" rows="4" placeholder="Alamat" required=""><?php echo $i["alamat"]; ?></textarea>
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