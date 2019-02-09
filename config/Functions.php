<?php
//Koneksi   ==>nm_host,usrname, password, nm_database 
$konek = mysqli_connect("localhost","root","","les_php");

function query($query){
    global $konek;
    $result = mysqli_query($konek, $query);
    $rows = [];
    while( $row =  mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $konek;

    //untuk keamanan data pada hacker gunakan function htmlspecialchar..
    $id = htmlspecialchars ($data["id_buku"]);
    $judul_buku = htmlspecialchars ($data["judul_buku"]);
    $penerbit = htmlspecialchars ($data["penerbit"]);
    $pengarang = htmlspecialchars ($data["pengarang"]);
    $tahun_terbit = htmlspecialchars ($data["tahun_terbit"]);
    $isbn = htmlspecialchars ($data["isbn"]);
    $qty = htmlspecialchars ($data["qty"]);

   //jalankan fungsi upload gambar/ foto
    $foto = upload();
    if ( !$foto ) {
        return false;
    }


    //query insert data
    $query = "INSERT INTO tb_buku VALUES ('','$judul_buku','$penerbit', '$pengarang', '$tahun_terbit', '$isbn', '$foto', '$qty', '', '', '', '', '')";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);

}

function upload(){
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    //cek apakah ada gambar yg diupload
    if ($error === 4) {
        echo "<script>
              alert('pilih gambar terlebih dahulu');
              </script>";
        return false;
    }

    //cek yg diupload gambar atau bukan ?
    $ExtGambarValid = ['jpg','jpeg','png'];
    //fungsi memecah string menjadi array
    $ExtGambar = explode('.', $namaFile);
    //ambil char paling terakhir--> strtolower(lowercase)
    $ExtGambar = strtolower(end($ExtGambar));

    if ( !in_array($ExtGambar, $ExtGambarValid)) {
         echo "<script>
              alert('Yang Anda upload bukan gambar');
              </script>
             ";
             return false;
    }

    //Cek ukuran gambar terlalu besar
    if ( $ukuranFile > 1000000) {
        echo "<script>
              alert('Ukuran gambar terlalu besar !');
              </script>
             ";
             return false;
    }

    //cek gambar untuk ambil random number 
    //generate nama baru
    // $namaFileBaru = uniqid();
    // $namaFileBaru .= '.';
    // $namaFileBaru .= $ExtGambar;

    //Cara upload File
    move_uploaded_file($tmpName, '../../images/' .$namaFile);

    return $namaFile;

}



function cari($keyword){
    $query = " SELECT * FROM tb_buku 
    WHERE 
    judul_buku LIKE '%$keyword%' OR 
    pengarang LIKE '%$keyword%' OR 
    tahun_terbit LIKE '%$keyword%' OR
    penerbit LIKE '%$keyword%'
    ";

    return query($query);
}

function hapus ($id){
    global $konek;
    mysqli_query($konek, "DELETE FROM  tb_buku WHERE id_buku = $id");
    return mysqli_affected_rows($konek);
}


function ubah($data){
    global $konek;
    
    //untuk keamanan data pada hacker gunakan function htmlspecialchar..
    $id = htmlspecialchars ($data["id_buku"]);
    $judul_buku = htmlspecialchars ($data["judul_buku"]);
    $penerbit = htmlspecialchars ($data["penerbit"]);
    $pengarang = htmlspecialchars ($data["pengarang"]);
    $tahun_terbit = htmlspecialchars ($data["tahun_terbit"]);
    $isbn = htmlspecialchars ($data["isbn"]);
    $qty = htmlspecialchars ($data["qty"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);


    //cek user pilih gambar baru atau lana
    if ( $_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto =  upload();
    }
    

    

    //query update data
    $query = "UPDATE tb_buku SET judul_buku = '$judul_buku', penerbit = '$penerbit', pengarang = '$pengarang', tahun_terbit = '$tahun_terbit', isbn = '$isbn', photo = '$foto', qty = '$qty', created_by = '', updated_by = '', created_date = '', updated_date = '', is_active = ''  WHERE id_buku = $id ";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);


}

?>