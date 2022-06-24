<!DOCTYPE html>
<html lang="en">
<head>
<?php 

if (isset($_POST['login'])){
  // code...
  session_start();
include '../conn.php';

 
$username = $koneksi -> real_escape_string($_POST['username']);
$password = md5($_POST['password']);
 
$login = mysqli_query($koneksi,"SELECT * FROM tbl_operator WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($login);
 
if($cek > 0){
  $data_user = mysqli_fetch_assoc($login);
  $_SESSION['id'] = $data_user['id_operator'];
  $_SESSION['username'] = $username;
  $_SESSION['level'] = $idoperator;
  $_SESSION['status'] = "login";
  header("location:../index.php");
}else{
  header("location:login.php?pesan=gagal");
}
}

?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <?php
                            if (isset($_GET['pesan'])) {
                                if ($_GET['pesan'] == "gagal") {
                                    echo "<div class='alert alert-warning' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Username dan Password Anda Salah ! </div>";
                                }elseif ($_GET['pesan'] == "logout") {
                                    echo "<div class='alert alert-success' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Terimakasih, anda berhasil logout </div>";
                                }elseif ($_GET['pesan'] == "belum_login") {
                                    echo "<div class='alert alert-info' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> Anda Belum Login !</div>";
                                }
                            }
                            ?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Sistem Inventory</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text"  name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="login" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
