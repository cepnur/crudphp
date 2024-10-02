<?php
$mahasiswa = [
        [
        "nrp" => "20200040078",
        "nama" => "Muhamad Cepnur Al-Basori",
        "email" => "muhamad.cepnur_ti20@nusaputra.ac.id",
        "prodi" => "Teknik Informatika",
        "gambar" => "yg.JPEG"
        ],
        [
        "nrp" => "20200040598",
        "nama" => "Dodi Mulyadi",
        "email" => "dodi.mulyadi_ti20@nusaputra.ac.id",
        "prodi" => "Teknik Informatika",
        "gambar" => "yiu.JPG"
        ],
        [
        "nrp" => "20200050076",
        "nama" => "Abdul Muiz",
        "email" => "abdul.muiz_ti20@nusaputra.ac.id",
        "prodi" => "Teknik Informatika",
        "gambar" => "yt.JPEG"
        ]

    ];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img{
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    
<h1>Daftar Mahasiswa</h1>
<>
<?php foreach($mahasiswa as $mhs) : ?>

    <li>
        <a href="latihan2.php?nama=<?= $mhs["nama"];?> 
        &nrp=<?= $mhs["nrp"]; ?> 
        &email=<?= $mhs["email"]; ?> 
        &prodi=<?= $mhs["prodi"]; ?> 
        &gambar=<?= $mhs["gambar"]; ?>">
            <?= $mhs["nama"] ; ?></a>
    </li> 

<?php endforeach; ?>
</ul>
    
</body>
</html>