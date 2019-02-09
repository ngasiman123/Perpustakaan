<?php
include '../../config/Functions.php';

//Koneksi
$konek = mysqli_connect("localhost","root","","les_php");

//Cek apakah button simpan sudah diklik atau belum
if(isset($_POST["simpan"])){

  
  
    //Cek apakah tambah data berhasil atau tidak ?
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                document.location.href = 'ReqDatabuku.php';
            </script>
        ";
    }

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
            <div style="background-color:white; height:510px; border: solid; border-left:0; float: right; overflow:scroll;">
                 <form action="" method="POST" enctype="multipart/form-data">
                    <div class="container" style="margin-top:20px; float:left; width:990px;">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:lavender; " ><b><center> Tambah Data Buku </center></b></div>
                            <div class="panel-body">
                                <!-- <label for="id_buku">ID Buku:</label> -->
                                <input type="hidden" class="form-control" name="id_buku" id="id_buku" placeholder="Silahkan Masukkan ID Buku" required>
                                <br>
                                <label for="judul_buku">Judul Buku:</label>
                                <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Silahkan Masukkan Judul Buku" required>
                                <br>
                                <label for="penerbit">Penerbit:</label>
                                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Silahkan Masukkan Penerbit" required>
                                <br>
                                
                                <label for="pengarang">Pengarang:</label>
                                <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Silahkan Masukkan pengarang" required>
                                <br>

                                <label for="tahun_terbit">Tahun Terbit:</label>
                                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="Masukkan Tahun Terbit">
                                <br>
                                <label for="isbn">ISBN:</label>
                                <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Silahkan Masukkan ISBN" required>
                                <br>
                                <label for="foto">Gambar Buku:</label>
                                <input type="file" class="form-control" name="foto" id="foto" placeholder="Silahkan Masukkan Nama Gambar" required>
                                <br>
                                <label for="qty">Qty:</label>
                                <input type="number" class="form-control" name="qty" id="qty" placeholder="Silahkan Masukkan Qty Buku" required>
                                <br>
                                <button class="btn btn-success" name="simpan">Simpan</button>
                             
                               
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>


</body>
</html>        
