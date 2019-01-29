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
    $foto = htmlspecialchars ($data["foto"]);

    //query insert data
    $query = "INSERT INTO tb_buku VALUES ('$id','$judul_buku','$penerbit', '$pengarang', '$tahun_terbit', '$isbn', '$qty', '$foto', '', '', '', '', '')";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);

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
?>