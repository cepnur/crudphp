<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$santris = query("SELECT * FROM santri");


//tombol cari di tekan
if ( isset($_POST["cari"])) {
    $santris = cari($_POST["keyword"]);
}

//ambil data dari tabel santri/ query data santri
// $result = mysqli_query($conn, "SELECT * FROM santri");

//untuk cek error
// if (!$result) {
//     echo mysqli_error($conn);
// }

//ambil data (fetch) santri dari object result
// mysqli_fetch_row() //mengembalikan array numerik
//mysqli_fetch_assoc()
//mysqli_fetch_array()
//mysqli_fetch_object()

// while ( $str = mysqli_fetch_assoc($result)) {
// var_dump($str);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>

    <a href="logout.php">Log Out</a>

<h1>Daftar Santri</h1>

<a href="tambah.php">tambah data santri</a>

<br> <br>

<form action="" method="post" >
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukan Pencarian" autocomplete="off" >
    <button type="submit" name="cari" >Cari</button>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0" >
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>NRS</th>
        <th>Email</th>
        <th>Prodi</th>
    </tr>

    
    <?php $i = 1; ?>
    <?php foreach( $santris as $row ) :  ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td>
            <a href="ubah.php?id=<?php echo $row['id']; ?>">ubah</a> |
            <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="
                return confirm('yakin?');" >Hapus</a>
        </td>
        <td><img src="img/<?php echo $row['gambar']; ?>" width="50" alt=""></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['nrs']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['prodi']; ?></td>
    </tr>

    <?php $i++; ?>
    <?php endforeach; ?>
    
</table>
    
</body>
</html>