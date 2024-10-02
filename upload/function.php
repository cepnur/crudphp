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

    //upload gambar
    $gambar = upload(); 
    if( !$gambar ) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO santri
            VALUES
            ('', '$nama', '$nrs', '$email', '$prodi', '$gambar' )
    ";
    mysqli_query($conn, $query);

    //cek data berhasil ditambah atau tidak
    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
            </script>
        ";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('upload gambar');
            </script>";
        return false;
    }

    //cek ukuran terlalu besar
    if( $ukuranFile > 1000000 ) {
        echo "<script>
            alert('maksimal ukuran gambar 1mb');
            </script>
        ";
        return false;
    }

    //generate nama file gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekan , gambar siap upload
    move_uploaded_file( $tmpName, 'img/'. $namaFileBaru);
    return $namaFileBaru;

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);


    //cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4 ) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


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