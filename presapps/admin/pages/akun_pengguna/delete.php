<?php 

include "../connection/connect.php";

$nik = mysqli_real_escape_string($connect, $_GET["id"]);
$sql = "DELETE FROM akun_pengguna WHERE nik='$nik'";
$result = mysqli_query($connect, $sql);
if(!$result){
	die("Error: ".mysqli_error($connect));
}
mysqli_close($connect);

?>

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
          <li class="breadcrumb-item active">Hapus Akun</li>
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
      <h3 class="card-title">Hapus Akun</h3>
    </div>
    <div class="card-body">
  		<p>Akun berhasil dihapus.</p>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <div class="row">
      	<div class="col-sm-4">
      		<a href="index.php?page=akun_pengguna" class="btn btn-default">
      			<i class="fas fa-arrow-left"></i> Kembali
      		</a>
      	</div>
      </div>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->