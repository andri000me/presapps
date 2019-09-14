<?php 

session_start();
if($_SESSION["hak_akses"] != "Admin"){
  header("location: ../login.php");
}

// header
include "layout/header.php";

// content
if(isset($_GET["page"])){

  $page = $_GET["page"];
  switch($page){

    // page: dashboard
    case "dashboard":
      include "pages/dashboard.php";
      break;

    // page: jabatan
    case "jabatan":
      if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "add"){
          include "pages/jabatan/add_form.php";
        }elseif($action == "edit"){
          if(isset($_GET["id"])){
            include "pages/jabatan/edit_form.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "delete"){
          if(isset($_GET["id"])){
            include "pages/jabatan/delete.php";
          }else{
            include "pages/error.php";
          }
        }else{
          include "pages/error.php";
        }
      }else{
        include "pages/jabatan/list.php";
      }
      break;

    // page: karyawan
    case "karyawan":
      if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "add"){
          include "pages/karyawan/add_form.php";
        }elseif($action == "edit"){
          if(isset($_GET["id"])){
            include "pages/karyawan/edit_form.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "delete"){
          if(isset($_GET["id"])){
            include "pages/karyawan/delete.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "detail"){
          if(isset($_GET["id"])){
            include "pages/karyawan/detail.php";
          }else{
            include "pages/error.php";
          }
        }else{
          include "pages/error.php";
        }
      }else{
        include "pages/karyawan/list.php";
      }
      break;

    // page: kehadiran
    case "kehadiran":
      if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "delete"){
          if(isset($_GET["id"])){
            include "pages/kehadiran/delete.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "detail"){
          if(isset($_GET["id"])){
            include "pages/kehadiran/detail.php";
          }else{
            include "pages/error.php";
          }
        }else{
          include "pages/error.php";
        }
      }else{
        include "pages/kehadiran/list.php";
      }
      break;

    // page: akun pengguna
    case "akun_pengguna":
      if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "add"){
          include "pages/akun_pengguna/add_form.php";
        }elseif($action == "edit"){
          if(isset($_GET["id"])){
            include "pages/akun_pengguna/edit_form.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "delete"){
          if(isset($_GET["id"])){
            include "pages/akun_pengguna/delete.php";
          }else{
            include "pages/error.php";
          }
        }elseif($action == "cpass"){
          if(isset($_GET["id"])){
            include "pages/akun_pengguna/cpass_form.php";
          }else{
            include "pages/error.php";
          }
        }else{
          include "pages/error.php";
        }
      }else{
        include "pages/akun_pengguna/list.php";
      }
      break;

    // page: profil saya
    case "profil_saya":
      if(isset($_GET["action"])){
        $action = $_GET["action"];
        if($action == "ganti_password"){
          include "pages/profil_pass.php";
        }else{
          include "pages/error.php";
        }
      }else{
        include "pages/profil.php";
      }
      break;

    // page: error
    default:
      include "pages/error.php";
      break;

  }

}else{

  include "pages/dashboard.php";

}

// footer
include "layout/footer.php";

?>