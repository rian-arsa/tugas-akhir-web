<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$usaha = query("SELECT * FROM usaha WHERE id = $id");

$mpdf = new \Mpdf\Mpdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>';
foreach ($usaha as $row)
    $html .= '
    <table style="text-align: center;" width="100%">
        <tr>
            <td><h4>PEMERINTAH KABUPATEN MALANG</h4></td>
        </tr>
        <tr>
            <td><h4>PEMERINTAH KECAMATAN TRENGGALEK</h4></td>
        </tr>
        <tr>
            <td><h2>KEPALA DESA AING</h2></td>
        </tr>
    </table>
    <hr style="height: 4px; color: black">
    <table style="text-align: center;" width="100%">
        <tr>
            <td><h4 style="text-decoration: underline">SURAT KETERANGAN USAHA</h4></td>
        </tr>
        <tr>
            <td> <p>Nomor : .......... </p></td>
        </tr>
    </table>
    <div class="container" style="text-align: center;">

    <p style="text-align: justify;">Yang bertanda tangan dibawah ini, Kepala Desa Aing, Kecamatan Trenggalek Kabupaten Malang, dengan ini menerangkan bahwa : </p>
    <table style="margin-left: 50px;">
        <ol>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama"] . '</td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>' . $row["tempat_lahir"] . ", " . tgl_indo($row["tgl_lahir"]) . '</td>
            </tr>
            <tr>
                <td>No KTP/NIK</td>
                <td>:</td>
                <td>' . $row["nik"] . '</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $row["jenis_kelamin"] . '</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>' . $row["agama"] . '</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $row["pekerjaan"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>' . "RT " . $row["rt"] . " RW " . $row["rw"] . " " . $row["desa"] . ", " . $row["kecamatan"] . ", " . $row["kabupaten"] . '</td>
            </tr>
        </ol>
    </table>
    <p style="text-align: justify;">adalah benar benar penduduk yang berdomisili di Desa ' . $row["desa"] . ', Kecamatan ' . $row["kecamatan"] . ', Kabupaten ' . $row["kabupaten"] . '.</p>

    <p style="text-align: justify;">Berdasarkan pengamatan yang telah kami lakukan memang benar yang bersangkutan mempunyai usaha ' . $row["jenis_usaha"] . ' dengan nama ' . $row["nama_usaha"] . ' di wilayah Desa Aing.</p>

    <p style="text-align: justify;">Adapun Surat Keterangan Usaha ini dibuat guna ' . $row["keperluan"] . ' .</p>

    <p style="text-align: justify;">Demikian Surat Keterangan Usaha ini kami keluarkan untuk dapat dipergunakan sebagaimana mestinya dan bagi instansi yang berkepentingan menjadi bahan perikasa adanya.</p>

    <table>
        <tr>
            <td>Dikeluarkan di</td>
            <td>:</td>
            <td>Aing</td>
        </tr>
        <tr>
            <td>Pada tanggal</td>
            <td>:</td>
            <td>' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table><br>
    <table>
        <tr>
            <td>Kepala Desa Aing</td>
        </tr>
        <tr>
            <td>Kecamatan Trenggalek, Malang</td>
        </tr>
    </table><br><br><br>
    <table>
        <tr>
            <td><p>Vishnu Adisaka</p></td>
        </tr>
    </table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
