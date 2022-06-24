<?php
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");

if(isset($_POST['tambah'])){
    $nama           = $_POST['namaoperator'];
    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $tgl = date('Y-m-d H:i:s', time());
    // insert into table barang masuk
    $query = "INSERT into tbl_operator (nama_operator, username, password, email, created_at) values ('$nama', '$username', '$email','$password', '$tgl')";

    $insert = $koneksi->query($query);

    if($insert){
        ?>
        <script>
            alert("Berhasil Menambahkan Operator !!");
            window.location="index.php?hal=daftar_operator";
        </script>
        <?php
    }
    
    
}
?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Operator</h3>
        </div>

        <form method="post" action="#">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Operator</label>
                    <input type="text" class="form-control" name="namaoperator" placeholder="Nama" >
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="E-mail" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" >
                </div>
                
            </div>

            <div class="card-footer">
                <button type="submit" name="tambah" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
    </div>
</div>