<?php 
    if( !isset($_GET["gambar"]) || 
     !isset($_GET["nama"]) || 
     !isset($_GET["nrp"]) || 
     !isset($_GET["email"]) || 
     !isset($_GET["prodi"])

) {
    header("location: getcth.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"]; ?>" alt=""></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["nrp"]; ?></li>
        <li><?= $_GET["email"]; ?></li>
        <li><?= $_GET["prodi"]; ?></li>
    </ul>

    <a href="getcth.php">kembali</a>
</body>
</html>