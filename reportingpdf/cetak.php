<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'function.php';
$santris = query("SELECT * FROM santri");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <table border="1" cellpadding="10" cellspacing="0" >
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>NRS</th>
                <th>Email</th>
                <th>Prodi</th>
            </tr>';


            $i = 1;
            foreach ( $santris as $row ) {
                $html .= '<tr>
                    <td>'. $i++ .'</td>
                    <td><img src="img/'. $row["gambar"] .'" width="50" height="50" ></td>
                    <td>'. $row["nrs"] .'</td>
                    <td>'. $row["nama"] .'</td>
                    <td>'. $row["email"] .'</td>
                    <td>'. $row["prodi"] .'</td>
                </tr>';
            }

$html .= '</table>

</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Santri.pdf', 'I');

?>