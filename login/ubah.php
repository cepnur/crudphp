<?php 
require 'function.php';


//ambil data url
$id = $_GET["id"];

//query data santri berdasar id
$str = query("SELECT * FROM santri WHERE id = $id")[0];


 //cek apakah tombol submit sudah dipencet
 if( isset($_POST["submit"])) {

    //cek data berhasil diubah atau tidak
    if ( ubah($_POST) > 0) {
        echo " 
         <script>
         alert ('data berhasil diubah');
         document.location.href = 'index.php';
         </script>
        ";
    } else {
        echo " 
         <script>
         alert ('data gagal diubah');
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
    <title>Ubah</title>
</head>
<body>

<h1>Ubah Data Santri</h1>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $str["id"]; ?>" >
<input type="hidden" name="gambarLama" value="<?= $str["gambar"]; ?>" >
    <ul>
        <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" required 
            value="<?= $str["nama"]; ?>" >
        </li>
        <li>
            <label for="nrs">NRS :</label>
            <input type="text" name="nrs" id="nrs" required 
            value="<?= $str["nrs"]; ?>">
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required 
            value="<?= $str["email"]; ?>">
        </li>
        <li>
            <label for="prodi">Prodi :</label>
            <input type="text" name="prodi" id="prodi" required 
            value="<?= $str["prodi"]; ?>">
        </li>
        <li>
            <label for="gambar">Gambar :</label> <br>
            <img src="img/<?= $str['gambar']; ?>" width="40"> <br>
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit"  >Ubah Data</button>
        </li>
    </ul>

</form>

</body>
</html>