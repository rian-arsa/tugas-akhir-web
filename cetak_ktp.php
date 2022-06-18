<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$warga = query("SELECT * FROM warga WHERE id = $id");

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
<body>
    <div width="100px" height="50px" style="float:left"><h6>ARSIP KECAMATAN</h6></div>
    <div width="100px" height="50px" style="float:left"></div>
    <div width="150px" height="50px" style="float:left"></div>
    <div width="100px" height="50px" style="float:left"></div>
    <div width="150px" height="50px" style="float:left"><h6>ARSIP KECAMATAN</h6></div>

    <div width="100px" height="50px" style="border: 1px solid black; float:left"></div>
    <div width="100px" height="50px" style="float:left"></div>
    <div width="150px" height="50px" style="border: 1px solid black; float:left"><h6 style="text-align: center"> Pas Foto Warna 4 x 6</h6></div>
    <div width="100px" height="50px" style="float:left"></div>
    <div width="150px" height="50px" style="border: 1px solid black; float:left"></div>
    <div class="container" style="text-align: center;  clear:both; padding-top: 50px;">
       <h3>PEMERINTAH KOTA AING</h3>
    </div>
    <table width=100%>';
foreach ($warga as $row)
    $html .= '<tr>
            <td width= 50%;>Kecamatan :' . $row["kecamatan"] . ' </td>
            <td>Kelurahan : ' . $row["desa"] . '</td>
        </tr>
    </table>
    <hr>
    <div class="container" style="text-align: center;">
       <h4>Formulir Isian Data Kartu Tanda Penduduk (KTP)</h4><br>
    </div>
    <table>
        <ol>
            <tr>
                <td><li></li></td>
                <td>NIK</td>
                <td>:</td>
                <td>' . $row["no_nik"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $row["jk"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>' . tgl_indo($row["tanggal_lahir"]) . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>' . $row["tempat_lahir"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Status Kawin</td>
                <td>:</td>
                <td>' . $row["status_perkawinan"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Agama</td>
                <td>:</td>
                <td>' . $row["agama"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Kewarganegaraan</td>
                <td>:</td>
                <td>' . $row["kewarganegaraan"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $row["pekerjaan"] . '</td>
            </tr>
            <tr>
                <td><li></li></td>
                <td>Alamat</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td align="left" style="padding-left: 20px;">RT</td>
                <td>:</td>
                <td>' . $row["rt"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td align="left" style="padding-left: 20px;">RW</td>
                <td>:</td>
                <td>' . $row["rw"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td align="left" style="padding-left: 20px;">Desa</td>
                <td>:</td>
                <td>' . $row["desa"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td align="left" style="padding-left: 20px;">Kecamatan</td>
                <td>:</td>
                <td>' . $row["kecamatan"] . '</td>
            </tr>
        </ol>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px;">' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">Mengetahui Lurah </td>
            <td align="right" style="padding-right: 100px;">Pemohon </td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">( Vishnu Adisaka )</td>
            <td align="right" style="padding-right: 70px;">(' . $row["nama"] . ' )</td>
        </tr>
    </table>
</body>
</html> 
';

$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
