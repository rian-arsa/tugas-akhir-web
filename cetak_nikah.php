<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$nikah = query("SELECT * FROM nikah WHERE id = $id");

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
foreach ($nikah as $row)
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
            <td><h4 style="text-decoration: underline">SURAT KETERANGAN BELUM MENIKAH</h4></td>
        </tr>
        <tr>
            <td> <p>Nomor : .......... </p></td>
        </tr>
    </table>
    <div class="container" style="text-align: center;">


    </div>
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
                <td>' . $row["tempat_lahir"] . ", " . tgl_indo($row["tanggal_lahir"]) . '</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $row["jk"] . '</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $row["pekerjaan"] . '</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>' . $row["agama"] . '</td>
            </tr>
            <tr>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>' . $row["kewarganegaraan"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>' . "RT " . $row["rt"] . " RW " . $row["rw"] . " " . $row["desa"] . ", " . $row["kecamatan"] . ", " . $row["kabupaten"] . '</td>
            </tr>
        </ol>
    </table>
    <p style="text-align: justify;">Dengan ini menerangkan bahwa orang tersebut diatas memang benar-benar penduduk Desa Aing Kecamatan Trenggalek Kabupaten Malang dan benar bahwa belum pernah menikah.</p>

    <p style="text-align: justify;">Surat Keterangan ini dipergunakan untuk ' . $row["keperluan"] . '.</p>

    <p style="text-align: justify;">Demikian Surat Keterangan Belum Menikah ini kami buat dan keluarkan dengan sebenarnya dan agar dapat dipergunakan sebagaimana mestinya.</p>
    <br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px; text-align: right;">Aing, ' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; ></td>
            <td align="right" style="padding-right: 100px;">Kepala Desa Aing </td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%;></td>
            <td align="right" style="padding-right: 100px;">( Vishnu Adisaka )</td>
        </tr>
    </table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
