<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Akun Pengguna</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Akun Pengguna</li>
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
    <i class="fas fa-info-circle"></i> Akun baru berhasil ditambahkan.
  </div>
  <?php }elseif($status == 2 || $status == 3){ ?>
  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Akun berhasil diedit.
  </div>  
  <?php
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Akun Pengguna</h3>
    </div>
    <div class="card-body">
  		<p>
  			<a href="index.php?page=akun_pengguna&action=add" class="btn btn-success">
  				<i class="fas fa-plus"></i> Buat Akun Baru
  			</a>
  		</p>
  		<table class="table table-bordered">
        <thead>                  
          <tr>
            <th style="width: 5%">#</th>
            <th style="width: 10%">NIK</th>
            <th>Nama Lengkap</th>
            <th style="width: 20%">Hak Akses</th>
            <th style="width: 20%">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include "../action_admin/akun_pengguna.php";
            $no = 1;
            while($i = mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $i["nik"]; ?></td>
            <td><?php echo $i["nama_lengkap"]; ?></td>
            <td><?php echo $i["hak_akses"]; ?></td>
            <?php if($i["nik"] != $_SESSION["nik"]){ ?>
            <td>
            	<a href="index.php?page=akun_pengguna&action=edit&id=<?php echo $i['nik']; ?>" class="btn btn-info">
            		<i class="fas fa-pencil-alt"></i> Edit
            	</a>
            	<a onclick="return confirm('Hapus akun?')" href="index.php?page=akun_pengguna&action=delete&id=<?php echo $i['nik']; ?>" class="btn btn-danger">
            		<i class="fas fa-trash"></i> Hapus
            	</a>
            </td>
            <?php }else{ ?>
            <td>
              <button type="button" class="btn btn-block btn-primary">Online</button>
            </td>
            <?php } ?>
          </tr>
          <?php 
              $no++;
            }
            if($no == 1){
          ?>
          <tr>
            <td colspan="6" align="center">
              <p>Belum ada akun pengguna tersimpan.</p>
              <p>Silahkan klik tombol buat akun untuk menambahkan akun pengguna.</p>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->