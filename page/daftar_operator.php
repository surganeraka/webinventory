<?php 
include("conn.php");

$data = $koneksi->query("SELECT * FROM tbl_operator WHERE deleted_at is null");

// print_r($data);
?>
<div class="col-12">
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Operator</h3>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Operator</th>
                    <th>Nama</th>
                    <th>E-Mail</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no=1;
                    while($value = $data->fetch_array()){
                        ?>
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$value['id_operator'];?></td>
                                <td><?=$value['nama_operator'];?></td>
                                <td><?=$value['email'];?></td>
                                <td>
                                    <a href="index.php?hal=edit_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="index.php?hal=hapus_operator&id=<?=$value['id_operator'];?>" class="btn btn-sm bg-gradient-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </a>

                                </td>
                            </tr>
                        <?php
                        $no++;
                    }

                ?>
                
                
            </tbody>
        </table>
    </div>

</div>
</div>