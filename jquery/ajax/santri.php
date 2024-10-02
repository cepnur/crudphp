<?php 
sleep(1); //hanya simulasi, jangan digunakan dalam project real atau bisa juga usleep(500000) untuk setengah detik
require'../function.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM santri 
                WHERE
                nama LIKE '%$keyword%' OR
                nrs LIKE '%$keyword%' OR
                email LIKE '%$keyword%'

                ";
$santris = query($query);
?>

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