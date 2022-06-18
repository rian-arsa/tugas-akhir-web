<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$skck = query("SELECT * FROM skck WHERE id = $id");

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
foreach ($skck as $row)
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
            <td><h4 style="text-decoration: underline">SURAT PENGANTAR MOHON SKCK</h4></td>
        </tr>
        <tr>
            <td> <p>Nomor : .......... </p></td>
        </tr>
    </table>
    <p>Yang Bertanda tangan dibawah ini :</p>
    <table>
    <ol>
        <tr>
            <td style="color: white"><li></li></td>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>VISHNU ADISAKA</td>
        </tr>
        <tr>
            <td style="color: white"><li></li></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>Kepala Desa Aing</td>
        </tr>
        <tr>
            <td style="color: white"><li></li></td>
            <td>Alamat</td>
            <td>:</td>
            <td>RT 01 / RW 001 Desa Aing, Kec. Trenggalek</td>
        </tr>
    </ol>
</table>
    <p>Dengan ini menerangkan bahwa :</p>
    <table>
        <ol>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $row["jenis_kelamin"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Agama</td>
                <td>:</td>
                <td>' . $row["agama"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Status</td>
                <td>:</td>
                <td>' . $row["status"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>No KTP/NIK</td>
                <td>:</td>
                <td>' . $row["nik"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>' . $row["tempat_lahir"] . ", " . tgl_indo($row["tgl_lahir"]) . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $row["pekerjaan"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Alamat</td>
                <td>:</td>
                <td>' . "RT " . $row["rt"] . " RW " . $row["rw"] . " Desa " . $row["desa"] . ", Kec." . $row["kecamatan"] . ", Kab. " . $row["kabupaten"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Keperluan</td>
                <td>:</td>
                <td>' . $row["keperluan"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Keterangan lain-lain</td>
                <td>:</td>
                <td>' . $row["keterangan"] . '</td>
            </tr>
            <tr>
                <td style="color: white"><li></li></td>
                <td>Berlaku mulai tanggal</td>
                <td>:</td>
                <td>' . tgl_indo($row["mulai"]) . " s/d " . tgl_indo($row["selesai"]) . '</td>
            </tr>
        </ol>
    </table>
    <p>Demikian Surat Keterangan ini dibuat untuk digunakan seperlunya.</p>
    <br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px;">' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">Tanda tangan Pemegang</td>
            <td align="right" style="padding-right: 100px; ">Kepala Desa Aing </td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px; font-weight: bold;">(' . $row["nama"] . ' )</td>
            <td align="right" style="padding-right: 70px; font-weight: bold;">( Vishnu Adisaka)</td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 45%; style="padding-left: 100px;"></td>
            <td align="left" style="padding-right: 70px; ">Mengetahui :</td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;">Danramil Aing</td>
            <td align="right" style="padding-right: 70px;">Camat Trenggalek</td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;font-weight: bold;">( .................... )</td>
            <td align="right" style="padding-right: 50px; font-weight: bold;">( RIAN ARI SASONO )</td>
        </tr>
    </table>
</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
