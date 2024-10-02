<?php 
//koneksi
$conn = mysqli_connect("localhost", "root", "", "maslakunnidzom");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data) {
    //koneksi ke dbms
    global $conn;
    //ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars( $data["nama"]);
    $nrs = htmlspecialchars( $data["nrs"]);
    $email = htmlspecialchars( $data["email"]);
    $prodi = htmlspecialchars( $data["prodi"]);
    $gambar = htmlspecialchars( $data["gambar"]);

    //query insert data
    $query = "INSERT INTO santri
            VALUES
            ('', '$nama', '$nrs', '$email', '$prodi', '$gambar' )
    ";
    mysqli_query($conn, $query);

    //cek data berhasil ditambah atau tidak
    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM santri WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    //koneksi ke dbms
    global $conn;
    //ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars( $data["nama"]);
    $nrs = htmlspecialchars( $data["nrs"]);
    $email = htmlspecialchars( $data["email"]);
    $prodi = htmlspecialchars( $data["prodi"]);
    $gambar = htmlspecialchars( $data["gambar"]);

    //query edit data
    $query = "UPDATE santri SET 
                nama = '$nama',
                nrs = '$nrs',
                email = '$email',
                prodi = '$prodi',
                gambar = '$gambar'
            WHERE id = $id
                ";
    mysqli_query($conn, $query);
    

    //cek data berhasil ditambah atau tidak
    return mysqli_affected_rows($conn);

}


function cari($keyword) {
    $query = "SELECT * FROM santri 
                WHERE
                nama LIKE '%$keyword%' OR
                nrs LIKE '%$keyword%' OR
                email LIKE '%$keyword%'

                ";

    return query($query);
}


?>