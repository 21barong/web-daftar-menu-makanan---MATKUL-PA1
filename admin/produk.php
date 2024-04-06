

<?php  require_once 'header_template.php'; 

        $query_select = 'select * from produk';
        $run_query_select = mysqli_query($conn,$query_select);

        //cek jika ada parameter delete
        if(isset($_GET['delete'])) {

            $query_select_foto = 'select foto from produk where idproduk ="'.$_GET['delete'].'" ';
            $run_query_select_foto = mysqli_query($conn,$query_select_foto);
            $d = mysqli_fetch_object($run_query_select_foto);

            
			// proses delete data extra menu berdasarkan idproduk
			$query_delete_extra = 'delete from extra_menu where idproduk = "'.$_GET['delete'].'"';
			$run_query_delete_extra = mysqli_query($conn, $query_delete_extra);



           // hapus file yang sebelumnya
			if(file_exists('../uploads/products/' . $d -> foto)){
				unlink('../uploads/products/' . $d -> foto);
			}
 

            //proses delete data
            $query_delete = 'delete from produk where idproduk = "'.$_GET['delete'].'" ';
            $run_query_delete = mysqli_query($conn,$query_delete);

            if ($run_query_delete){
                echo "<script>window.location = 'produk.php'</script>";
            } else {
                echo "<script>alert('Data gagal dihapus')</script>";
            }
        }
?>


<div class="content">
    <div class="container">

    <h3 class="page-title"> Produk </h3>

        <div class="card">

        <a href="produk_add.php" class="btn"><i class="fa fa-plus"></i></a>
        
            <table class="table">
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($run_query_select) > 0) { ?>
                        <?php $nomor = 1; ?>
                        <?php while($row = mysqli_fetch_array($run_query_select)) { ?>
                    <tr>
                        <td align="center"><?= $nomor++ ?></td>
                        <td><img src="../uploads/products/<?= $row['foto'] ?>" width="80px"></td>
                        <td><?= $row['namaproduk'] ?></td>
                        <td><?= $row['hargaproduk'] ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['deskripsi'] ?></td>>
                        <td align="center">
                        <a href="produk_edit.php?id= <?= $row['idproduk'] ?>" class="btn"><i class="fa fa-edit"></i></a>
                        <a href="?delete=<?= $row['idproduk'] ?>" class="btn" onclick="return confirm('Yakin ?')"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                        <?php }} else { ?>
                        
                            <tr>
                                <td colspan="7">Tidak ada Data</td>
                            </tr>

                        <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>


<?php require_once 'footer_template.php'; ?>



  


           