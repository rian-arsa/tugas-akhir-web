<?php

require_once __DIR__ . '/vendor/autoload.php';


require 'functions.php';

$id = $_GET["id"];

$lahir = query("SELECT * FROM kelahiran WHERE id = $id");

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
            <tr>
                <td>Kode Wilayah</td>
                <td>:</td>
                <td>1234567890</td>
            </tr>
        </table>
    </div>
    <div class="container" style="text-align: center;">
        <h3>SURAT KETERANGAN KELAHIRAN</h3>
    </div>';
foreach ($lahir as $row)
    $html .= '<div class="container">
        <table>
            <tr>
                <td>Nama Kepala Keluarga</td>
                <td>:</td>
                <td>' . $row["nama_kpl"] . '</td>
            </tr>
            <tr>
                <td>Nomor Kartu Keluarga</td>
                <td>:</td>
                <td>' . $row["no_kk"] . '</td>
            </tr>
        </table>
    </div><hr>
    <div class="container">
    <h4>BAYI / ANAK</h4>
        <table>
            <ol>
                <tr>
                    <td><li></li></td>
                    <td>Nama</td>
                    <td>:</td>
                    <td>' . $row["nama_anak"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>' . $row["jk"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Tempat dilahirkan</td>
                    <td>:</td>
                    <td>' . $row["tempat_lahir"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Hari dan Tanggal Lahir</td>
                    <td>:</td>
                    <td>' . $row["hari"] . ", " . tgl_indo($row["tgl_lahir"]) . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Pukul</td>
                    <td>:</td>
                    <td>' . $row["pukul"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Jenis Kelahiran</td>
                    <td>:</td>
                    <td>' . $row["jenis_lahir"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Kelahiran ke</td>
                    <td>:</td>
                    <td>' . $row["ke"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Penolong Kelahiran</td>
                    <td>:</td>
                    <td>' . $row["penolong"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Berat bayi</td>
                    <td>:</td>
                    <td>' . $row["berat"] . " Kg" . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Panjang bayi</td>
                    <td>:</td>
                    <td>' . $row["panjang"] . " Cm" . '</td>
                </tr>
            </ol>
        </table>
    </div><hr>
    <div class="container">
    <h4>I B U</h4>
        <table>
            <ol>
                <tr>
                    <td><li></li></td>
                    <td>NIK</td>
                    <td>:</td>
                    <td>' . $row["nik_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>' . $row["nama_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Tanggal lahir</td>
                    <td>:</td>
                    <td>' . $row["tgl_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>' . $row["pekerjaan_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' . "a. Desa/kelurahan :" . $row["desa_ibu"] . '</td>
                    <td>' . "c. Kab/kota       :" . $row["kab_ibu"] . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' . "b. Kecamatan :" . $row["kec_ibu"] . '</td>
                    <td>' . "d. Provinsi  :" . $row["prov_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>' . $row["kewar_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td>' . $row["kebang_ibu"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Tgl Pencatatan Perkawinan</td>
                    <td>:</td>
                    <td>' . $row["tgl_kawin"] . '</td>
                </tr>
            </ol>
        </table>
    </div>
    <div class="container"><hr>';
$html2 = '
    <hr>
    <h4>A Y A H</h4>
        <table>
            <ol>
                <tr>
                    <td><li></li></td>
                    <td>NIK</td>
                    <td>:</td>
                    <td>' . $row["nik_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>' . $row["nama_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Tanggal lahir</td>
                    <td>:</td>
                    <td>' . $row["tgl_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>' . $row["pekerjaan_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' . "a. Desa/kelurahan :" . $row["desa_ayah"] . '</td>
                    <td>' . "c. Kab/kota       :" . $row["kab_ayah"] . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' . "b. Kecamatan :" . $row["kec_ayah"] . '</td>
                    <td>' . "d. Provinsi  :" . $row["prov_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Kewarganegaraan</td>
                    <td>:</td>
                    <td>' . $row["kewar_ayah"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Kebangsaan</td>
                    <td>:</td>
                    <td>' . $row["kebang_ayah"] . '</td>
                </tr>
            </ol>
        </table>
    </div><hr>
    <h4>PELAPOR</h4>
        <table>
            <ol>
                <tr>
                    <td><li></li></td>
                    <td>NIK</td>
                    <td>:</td>
                    <td>' . $row["nik_lapor"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <td>' . $row["nama_lapor"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Umur</td>
                    <td>:</td>
                    <td>' . $row["umur"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Jenis kelamin</td>
                    <td>:</td>
                    <td>' . $row["jk_lapor"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td>' . $row["pekerjaan_lapor"] . '</td>
                </tr>
                <tr>
                    <td><li></li></td>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>' . "a. Desa/kelurahan :" . $row["desa_lapor"] . '</td>
                    <td>' . "c. Kab/kota       :" . $row["kab_lapor"] . '</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>' . "b. Kecamatan :" . $row["kec_lapor"] . '</td>
                    <td>' . "d. Provinsi  :" . $row["prov_lapor"] . '</td>
                </tr>
            </ol>
        </table>
    </div><br><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td align="right" style="padding-right: 100px;">' . "Aing, " . tgl_indo(date("Y-m-d")) . ' </td>
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
            <td align="right" style="padding-right: 70px;">(' . $row["nama_lapor"] . ' )</td>
        </tr>
    </table>

';

$mpdf->WriteHTML($html);
$mpdf->AddPage();
$mpdf->WriteHTML($html2);
$mpdf->Output("surat kelahiran", \Mpdf\Output\Destination::INLINE);
