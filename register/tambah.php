<?php 
require 'function.php';
 //cek apakah tombol submit sudah dipencet
 if( isset($_POST["submit"])) {

    //cek data berhasil ditambah atau tidak
    if ( tambah($_POST) > 0) {
        echo " 
         <script>
         alert ('data berhasil ditambah');
         document.location.href = 'index.php';
         </script>
        ";
    } else {
        echo " 
         <script>
         alert ('data gagal ditambah');
         document.location.href = 'index.php';
         </script>
        ";
    }
    
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>
<body>

<h1>Tambah Data Santri</h1>

<form action="" method="POST" enctype="multipart/form-data" >
    <ul>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required >
        </li>
        <li>
            <label for="nrs">NRS :</label>
            <input type="text" name="nrs" id="nrs" required >
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required >
        </li>
        <li>
            <label for="prodi">Prodi :</label>
            <input type="text" name="prodi" id="prodi" required >
        </li>
        <li>
            <label for="gambar">Gambar :</label>
            <input type="file" name="gambar" id="gambar" >
        </li>
        <li>
            <button type="submit" name="submit"  >Tambah Data</button>
        </li>
    </ul>

</form>

</body>
</html>