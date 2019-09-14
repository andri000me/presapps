<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Jabatan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Jabatan</li>
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
    <i class="fas fa-info-circle"></i> Jabatan baru berhasil ditambahkan.
  </div>
  <?php }elseif($status == 2){ ?>
  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Jabatan berhasil diedit.
  </div>
  <?php
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Jabatan</h3>
    </div>
    <div class="card-body">
  		<div class="row">
        <div class="col-sm-6">
          <p>
            <a href="index.php?page=jabatan&action=add" class="btn btn-success">
              <i class="fas fa-plus"></i> Tambah Jabatan Baru
            </a>
          </p>
        </div> 
      </div>
  		<table class="table table-bordered">
        <thead>                  
          <tr>
            <th style="width: 5%">#</th>
            <th>Nama Jabatan</th>
            <th style="width: 20%">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include "../action_admin/jabatan.php";
            $no = 1;
            while($i = mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $i["nama_jabatan"]; ?></td>
            <td>
            	<a href="index.php?page=jabatan&action=edit&id=<?php echo $i['id_jabatan']; ?>" class="btn btn-info">
            		<i class="fas fa-pencil-alt"></i> Edit
            	</a>
            	<a onclick="return confirm('Hapus jabatan?')" href="index.php?page=jabatan&action=delete&id=<?php echo $i['id_jabatan']; ?>" class="btn btn-danger">
            		<i class="fas fa-trash"></i> Hapus
            	</a>
            </td>
          </tr>
          <?php 
              $no++;
            }
            if($no == 1){
          ?>
          <tr>
            <td colspan="3" align="center">
              <p>Belum ada jabatan tersimpan.</p>
              <p>Silahkan klik tombol tambah jabatan untuk menambahkan jabatan.</p>
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