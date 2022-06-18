<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$mati = query("SELECT * FROM mati WHERE id = $id");

$mpdf = new \Mpdf\Mpdf();
$html = '
    <div class="container">
        <table>
            <tr>
                <td>Pemerintah Desa/Kelurahan</td>
                <td>:</td>
                <td>Aing</td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>Trenggalek</td>
            </tr>
            <tr>
                <td>Kabupaten/Kota</td>
                <td>:</td>
                <td>Malang</td>
            </tr>
        </table>
    </div><hr>
    <div class="container" style="text-align: center;">
        <h3>SURAT KETERANGAN KEMATIAN</h3>
    </div>';

foreach ($mati as $row)
    $html .= '
    <div class="container">
        <table>
            <tr>
                <td style="padding-left: 40px;">Yang bertanda tangan dibawah ini :</td>
            </tr>
        </table>
    </div>
    <div class="container">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama_lapor"] . '</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>' . $row["nik_lapor"] . '</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td>' . $row["umur_lapor"] . '</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>' . $row["pekerjaan_lapor"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td></td>
                <td>' . "a. RT :" . $row["rt_lapor"] . '</td>
                <td>' . "b. RW      :" . $row["rw_lapor"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>' . "c. Desa/kelurahan :" . $row["desa_lapor"] . '</td>
                <td>' . "d. Kecamatan      :" . $row["kec_lapor"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>' . "e. Kab/kota :" . $row["Kab_lapor"] . '</td>
            </tr>
            <tr><td style="color:white">.</td></tr>
            <tr>
                <td>Hubungan dengan yang mati </td>
                <td>:</td>
                <td>' . $row["hub"] . '</td>
            </tr>
            <tr><td style="color:white">.</td></tr>
        </table>
    </div>
    <div class="container">
        <table>
            <tr>
                <td style="padding-left: 40px;">Melaporkan bahwa :</td>
            </tr>
        </table>
    </div>
    <div class="container">
        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama_mati"] . '</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>' . $row["nik_mati"] . '</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>' . $row["jk_mati"] . '</td>
            </tr>
            <tr>
                <td>Tanggal lahir/umur</td>
                <td>:</td>
                <td>' . tgl_indo($row["tgl_mati"]) . '</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>' . $row["agama"] . '</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td></td>
                <td>' . "a. RT :" . $row["rt_mati"] . '</td>
                <td>' . "b. RW      :" . $row["rw_mati"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>' . "c.  Desa/kelurahan :" . $row["desa_mati"] . '</td>
                <td>' . "d. Kecamatan      :" . $row["kec_mati"] . '</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>' . "e. Kab/kota :" . $row["kab_mati"] . '</td>
            </tr>
            <tr>
                <td style="color:white">Hubungan dengan yang mati </td>
            </tr>
        </table>
    </div><div class="container">
    <table>
        <tr>
            <td style="padding-left: 40px;">Telah meninggal dunia pada :</td>
        </tr>
    </table>
</div>
<div class="container">
    <table>
        <tr>
            <td>Hari</td>
            <td>:</td>
            <td>' . $row["hari"] . '</td>
        </tr>
        <tr>
            <td>Tanggal Kematian</td>
            <td>:</td>
            <td>' . tgl_indo($row["tgl_kematian"]) . '</td>
        </tr>
        <tr>
            <td>Pukul</td>
            <td>:</td>
            <td>' . $row["pukul"] . '</td>
        </tr>
        <tr>
            <td>Bertempat di</td>
            <td>:</td>
            <td>' . $row["bertempat"] . '</td>
        </tr>
        <tr>
            <td>Penyebab kematian</td>
            <td>:</td>
            <td>' . $row["penyebab"] . '</td>
        </tr>
        <tr>
            <td>Bukti Kematian</td>
            <td>:</td>
            <td>' . $row["bukti"] . '</td>
        </tr>
        <tr>
            <td style="color:white">Hubungan dengan yang mati </td>
        </tr>
    </table>
</div>



    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px;">' . "Aing, " . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px;">Pelapor </td>
        </tr>
    </table><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 70px;">(' . $row["nama_lapor"] . ' )</td>
        </tr>
    </table>

';

$mpdf->WriteHTML($html);
$mpdf->Output("surat kelahiran", \Mpdf\Output\Destination::INLINE);
