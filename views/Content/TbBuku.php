<?php

include '../../config/Functions.php';


 //query
 $books = query("SELECT * FROM tb_buku");

 //jika tombol cari di Klik
 if(isset($_POST["cari"])){
     $books = cari($_POST["keyword"]);
 } else {
     $books = query("SELECT * FROM tb_buku");
 }


?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link rel="stylesheet"  href="../../bootstrap.min.css" />
</head>
<body>





            <!-- Content -->
            <div style="background-color:white; height:510px; width:990px; border: solid; border-left:0; float: right; overflow:scroll;">
                <div>
                     <div class="container-fluid" style="margin-top:10px;">
                        <div class="panel panel-default" style="width:910px; ">
                            <div class="panel-heading" style="background-color: lavender;"><b><center>Data Buku</center></b></div><br>
                            
                            <form action="" method="POST"> 
                            <input type="text" name="keyword" class="form-control" style="width:240px; margin-right:15px; margin-bottom:10px; float:right;" placeholder="Search All Keyword" autofocus autocomplete="off"> 
                            <a href="../Req/ReqAddbuku.php" class="btn btn-info" style="margin-left:15px;">Tambah Data</a>
                            <button type="submit" name="cari" class="btn btn-success" style="float:right; margin-right:10px;">Cari</button> 
                            </form>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover">
                                    <tr class="table table-bordered table-striped">
                                        <th>No.</th>
                                        <th>Aksi</th>
                                        <th>Gambar</th>
                                        <th>ID</th>
                                        <th>Judul Buku</th>
                                        <th>Penerbit</th>
                                        <th>Pengarang</th>
                                        <th>Tahun Terbit</th>
                                        <th>ISBN</th>
                                        <th>Qty</th>
                                    </tr>
                                    <?php $i=1; ?>
                                    <?php foreach($books as $book) : ?>
                                    <tr>
                                        <td><?= $i;  ?></td>
                                        <td>
                                            <a href="../../views/Req/ReqUpdateBuku.php?id=<?= $book["id_buku"]; ?>"  onclick = "return confirm ('Yakin akan ubah data ?')">Ubah ||</a>
                                            <a href="../../views/Req/PrHapusBuku.php?id=<?= $book["id_buku"]; ?>" onclick = "return confirm ('Yakin Anda ingin menghapus data ini ?')">Hapus</a>
                                        </td>
                                        <td><img src="../../images/<?= $book["photo"]; ?>" width="30" alt="<?php $book["photo"]; ?>"></td>
                                        <td><?= $book["id_buku"]; ?></td>
                                        <td><?= $book["judul_buku"]; ?></td>
                                        <td><?= $book["penerbit"]; ?></td>
                                        <td><?= $book["pengarang"]; ?></td>
                                        <td><?= $book["tahun_terbit"]; ?></td>
                                        <td><?= $book["isbn"]; ?></td>
                                        <td><?= $book["qty"]; ?></td>
                                    </tr>
                                    <?php $i++ ?>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 


 </body>
</html>