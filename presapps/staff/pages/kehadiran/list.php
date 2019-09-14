<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kehadiran</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Kehadiran</li>
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
      <h3 class="card-title">Daftar Kehadiran</h3>
    </div>
    <div class="card-body">
  		<table class="table table-bordered">
        <thead>                  
          <tr>
            <th style="width: 5%">#</th>
            <th>Tanggal</th>
            <th style="width: 15%">NIK</th>
            <th>Nama</th>
            <th>Jam Datang</th>
            <th>Jam Pulang</th>
            <th style="width: 10%">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            include "../action_staff/kehadiran.php";
            $no = 1;
            while($i = mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $i["tanggal"]; ?></td>
            <td><?php echo $i["nik"]; ?></td>
            <td><?php echo $i["nama_lengkap"]; ?></td>
            <td><?php echo $i["jam_datang"]; ?></td>
            <td><?php echo $i["jam_pulang"]; ?></td>
            <td>
            	<a href="index.php?page=kehadiran&action=detail&id=<?php echo $i['id_kehadiran']; ?>" class="btn btn-primary">
            		<i class="fas fa-folder"></i> Lihat
            	</a>
            </td>
          </tr>
          <?php 
              $no++;
            }
            if($no == 1){
          ?>
          <tr>
            <td colspan="7" align="center">
              <p>Belum ada data kehadiran tersimpan.</p>
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