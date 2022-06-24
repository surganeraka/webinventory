<?php
include("./conn.php");
date_default_timezone_set("Asia/Jakarta");


if(isset($_GET['id'])){

    $id_operator = $_GET['id'];
    $tgl = date('Y-m-d H:i:s', time());
    // query untuk melakukan insert data ke dalam tabel barang
    $query = "SELECT * FROM tbl_operator where id_operator='$id_operator'";
    
    $data = $koneksi->query($query);
    
    while($value = $data->fetch_array()){
        $nama  = $value['nama_operator'];
        $username = $value['username'];
        $password = $value['password'];
        $email = $value['email'];
    }
}
if(isset($_POST['edit'])){
    $id_operator    = $_POST['id'];
    $nama           = $_POST['namaoperator'];
    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $tgl = date('Y-m-d H:i:s', time());
    // insert into table operator
    $query = "UPDATE  tbl_operator set nama_operator = '$nama', username = '$username', password = '$password', email = '$password', updated_at = '$tgl' WHERE id_operator = '$id_operator' ";

    $insert = $koneksi->query($query);

    if($insert){
        ?>
        <script>
            alert("Berhasil Memperbaharui Operator !!");
            window.location="index.php?hal=daftar_operator";
        </script>
        <?php
    }
    
    
}
?>

<div class="col-md-6">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Operator</h3>
        </div>

        <form method="post" action="">
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" value="<?=$id_operator;?>" name="id">
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Operator</label>
                    <input type="text" class="form-control" value="<?=$nama;?>" name="namaoperator" placeholder="Nama" >
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input type="text" class="form-control" value="<?=$username;?>" name="username" placeholder="Username" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">E-mail</label>
                    <input type="email" class="form-control" value="<?=$email;?>" name="email" placeholder="E-mail" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" value="<?=$password;?>" name="password" >
                </div>
                
            </div>

            <div class="card-footer">
                <button type="submit" name="edit" class="btn btn-primary">Edit Operator</button>
            </div>
        </form>
    </div>
</div>