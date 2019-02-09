<?php 
include '../../config/Functions.php';



//Ambil data dari URL
$id = $_GET["id"];

//Query data berdasarkan id
$books = query("SELECT * FROM tb_buku WHERE id_buku = $id")[0];



//Cek apakah button simpan sudah diklik atau belum
if(isset($_POST["simpan"])){
  
    //Cek apakah tambah data berhasil atau tidak ?
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
    }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Data Buku</title>
    <link rel="stylesheet"  href="../../bootstrap.min.css" />
</head>
<body>

            <!-- Content -->
            <div style="background-color:white; height:510px; border: solid; border-left:0; float: right; overflow:scroll;">
                 <div style="display: inline-block;">
                     <form method="POST" enctype="multiparts/form-data">
                        <div class="container" style="margin-top:20px; float:left; width:490px;">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color:lavender; " ><b><center> Update Data Buku </center></b></div>
                                <div class="panel-body">
                                    <input type="hidden" name="id_buku" value="<?= $books["id_buku"]; ?>">
                                    <input type="hidden" name="fotoLama" value="<?= $books["photo"]; ?>">
                                    <br>
                                    <label for="judul_buku">Judul Buku:</label>
                                    <input type="text" class="form-control" name="judul_buku" id="judul_buku" value="<?= $books["judul_buku"]; ?>" required>
                                    <br>
                                    <label for="penerbit">Penerbit:</label>
                                    <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $books["penerbit"]; ?>" required>
                                    <br>
                                    
                                    <label for="pengarang">Pengarang:</label>
                                    <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $books["pengarang"]; ?>" required>
                                    <br>

                                    <label for="tahun_terbit">Tahun Terbit:</label>
                                    <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $books["tahun_terbit"]; ?>">
                                    <br>
                                    <label for="isbn">ISBN:</label>
                                    <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $books["isbn"]; ?>" required>
                                    <br>
                                    <label for="foto">Gambar Buku:</label>
                                    <input type="file" class="form-control" name="foto" id="foto" required>
                                    <br>
                                    <label for="qty">Qty:</label>
                                    <input type="number" class="form-control" name="qty" id="qty" value="<?= $books["qty"]; ?>" required>
                                    <br>
                                    <button class="btn btn-success" name="simpan">Update</button>
                                 
                                   
                                </div>
                            </div>
                        </div>
                        <div class="container" style="margin-top:20px; float:left; width:500px; padding: 20px;">
                            <div> 
                                <img style=" width:350px; height: auto; " src="../../images/<?= $books["photo"]; ?>">
                            </div>
                        </div>
                    </form>

                 </div>
            </div>
        </div>


</body>
</html>        
