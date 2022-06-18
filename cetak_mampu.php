<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$mampu = query("SELECT * FROM mampu WHERE id = $id");

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
foreach ($mampu as $row)
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
            <td><h4 style="text-decoration: underline">SURAT KETERANGAN TIDAK MAMPU</h4></td>
        </tr>
        <tr>
            <td> <p>Nomor : .......... </p></td>
        </tr>
    </table>
    <div class="container" style="text-align: center;">

    <p>Yang bertanda tangan dibawah ini, Kepala Desa Aing, Kecamatan Trenggalek Kabupaten Malang, dengan ini menerangkan bahwa : </p>
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

    <p style="text-align: justify;"><span style="color: white;">hallo</span>Benar nama yang tercantum adalah warga Desa Aing Kecamatan Trenggalek Kabupaten Malang. Dengan ini sepengetahuan kami dan sesuai data yang ada di kantor Desa orang tersebut diatas benar keluarga kurang mampu <span style="font-weight: bold; font-style: italic;">( KELUARGA BERPENGHASILAN RENDAH )</span>. Dan Surat Keterangan ini diberikan untuk ' . $row["keperluan"] . '.</p><br>

    <p style="text-align: justify;"><span style="color: white;">hallo</span>Demikian Surat keterangan ini dibuat dengan sebenarnya untuk yang bersangkutan dan kiranya dapat dipergunakan seperlunya.</p>

    <br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">Mengetahui :</td>
            <td align="right" style="padding-right: 100px;">Aing' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px; font-weight: bold;">CAMAT TRENGGALEK </td>
            <td align="right" style="padding-right: 100px; font-weight: bold;">KEPALA DESA AING </td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">( RIAN ARI SASONO )</td>
            <td align="right" style="padding-right: 100px;">( VISHNU ADISAKA )</td>
        </tr>
    </table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
