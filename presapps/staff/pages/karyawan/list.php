<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Karyawan</li>
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
    <i class="fas fa-info-circle"></i> Karyawan baru berhasil ditambahkan.
  </div>
  <?php }elseif($status == 2){ ?>
  <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <i class="fas fa-info-circle"></i> Data karyawan berhasil diedit.
  </div>
  <?php
      }
    }
  ?>
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Karyawan</h3>
    </div>
    <div class="card-body">
  		<p>
  			<a href="index.php?page=karyawan&action=add" class="btn btn-success">
  				<i class="fas fa-plus"></i> Tambah Karyawan Baru
  			</a>
  		</p>
  		<table class="table table-bordered">
        <thead>                  
          <tr>
            <th style="width: 5%">#</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Jabatan</th>
            <th style="width: 30%">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include "../action_staff/karyawan.php";
            $no = 1;
            while($i = mysqli_fetch_assoc($result)){
              $id_jabatan = $i["id_jabatan"];
              $sql2 = "SELECT * FROM jabatan WHERE id_jabatan='$id_jabatan'";
              $result2 = mysqli_query($connect, $sql2);
              $j = mysqli_fetch_assoc($result2);
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $i["nik"]; ?></td>
            <td><?php echo $i["nama_lengkap"]; ?></td>
            <td><?php echo $i["jenis_kelamin"]; ?></td>
            <td><?php echo $j["nama_jabatan"]; ?></td>
            <?php if($i["nik"] != $_SESSION["nik"]){ ?>
            <td>
            	<a href="index.php?page=karyawan&action=detail&id=<?php echo $i['nik']; ?>" class="btn btn-primary">
            		<i class="fas fa-folder"></i> Lihat
            	</a>
            	<a href="index.php?page=karyawan&action=edit&id=<?php echo $i['nik']; ?>" class="btn btn-info">
            		<i class="fas fa-pencil-alt"></i> Edit
            	</a>
            	<a onclick="return confirm('Hapus karyawan?')" href="index.php?page=karyawan&action=delete&id=<?php echo $i['nik']; ?>" class="btn btn-danger">
            		<i class="fas fa-trash"></i> Hapus
            	</a>
            </td>
            <?php }else{ ?>
            <td>
              <a href="index.php?page=karyawan&action=detail&id=<?php echo $i['nik']; ?>" class="btn btn-primary">
                <i class="fas fa-folder"></i> Lihat
              </a>
              <a href="index.php?page=karyawan&action=edit&id=<?php echo $i['nik']; ?>" class="btn btn-info">
                <i class="fas fa-pencil-alt"></i> Edit
              </a>
              <a onclick="return confirm('Hapus karyawan?')" href="index.php?page=karyawan&action=delete&id=<?php echo $i['nik']; ?>" class="btn btn-danger disabled">
                <i class="fas fa-trash"></i> Hapus
              </a>
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
              <p>Belum ada data karyawan tersimpan.</p>
              <p>Silahkan klik tombol tambah karyawan untuk menambahkan data karyawan.</p>
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