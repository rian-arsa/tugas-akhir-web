<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';

$id = $_GET["id"];

$kk = query("SELECT * FROM kk WHERE id = $id");
$anggota = query("SELECT * FROM kk INNER JOIN anggota ON kk.nik=anggota.nik WHERE kk.nik = anggota.nik AND kk.id = $id");

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

$html .= '
    <table style="text-align: center;" width="100%">
        <tr>
            <td><h4>FORMULIR ISIAN KARTU KELUARGA ( KK )</h4></td>
        </tr>
        <tr>
            <td><h4>PENDUDUK WARGA NEGARA INDONESIA</h4></td>
        </tr>
    </table><br>
    <div width="50%" style="float: left">
        <table>
            <tr>
                <td><h4>DATA KEPALA KELUARGA</h4></td>
            </tr>
            <tr>';
foreach ($kk as $row) :
    $html .= '

                <td>NAMA KEPALA KELUARGA </td>
                <td> : </td>
                <td>' . $row["nama_kepala"] . '</td>
            </tr>
            <tr>
                <td>ALAMAT </td>
                <td> : </td>
                <td>' . $row["alamat"] . '</td>
            </tr>
            <tr>
                <td>KODE POS </td>
                <td> : </td>
                <td>' . $row["alamat"] . ' RT ' . $row["rt"] . ', RW ' . $row["rw"] . '</td>
            </tr>
            <tr>
                <td>TELEPON </td>
                <td> : </td>
                <td>' . $row["telepon"] . '</td>
            </tr>
        </table>
        ';
endforeach;
$html .= '
    </div> 
    <div width="50%" style="float: right">
        <table>
            <tr>
                <td></td>
                <td><h5>Diisi oleh Petugas</h5></td>
            </tr>
            <tr>
                <td>Kode-Nama Povinsi</td>
                <td> : </td>
            </tr>
            <tr>
                <td>Kode-Nama Kabupaten</td>
                <td> : </td>
            </tr>
            <tr>
                <td>Kode-Nama Kecamatan</td>
                <td> : </td>
            </tr>
            <tr>
                <td>Kode-Nama Kelurahan</td>
                <td> : </td>
            </tr>
        </table>
    </div><br>
    <div width="100%" >
        <table border="1" width="100%" style="border-collapse: collapse;">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th> 
                <th>Tanggal Lahir</th> 
                <th>Agama</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
            </tr>';
$i = 1;
foreach ($anggota as $rows) :
    $html .= '

            <tr>
                <td align="center">' . $i . '</td>
                <td align="center">' . $rows["nama"] . '  </td>
                <td align="center">' . $rows["nik_anggota"] . '  </td>
                <td align="center">' . $rows["jenis_kelamin"] . '  </td>
                <td align="center">' . $rows["tempat_lahir"] . '</td>
                <td align="center">' . $rows["tanggal_lahir"] . '</td>
                <td align="center">' . $rows["agama"] . '  </td>
                <td align="center">' . $rows["pendidikan"] . '</td>
                <td align="center">' . $rows["pekerjaan"] . '</td>
                <td align="center">' . $rows["alamat"] . '</td>
            </tr>';
    $i++;
endforeach;
$html .=  '
        </table>
    </div><br>
    <div width="100%" >
        <table border="1" width="100%" style="border-collapse: collapse;">
            <tr>
                <th>No</th>
                <th>Status Perkawinan</th>
                <th>Status Hubungan Dalam Keluarga</th>
                <th>Kewarganegaraan</th> 
                <th>No. Paspor</th> 
                <th>No. KITAS/KITAP</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
            </tr>';
$i = 1;
foreach ($anggota as $rows) :

    $html .= '
            
            <tr>
                <td align="center">' . $i . '</td>
                <td align="center">' . $rows["status_perkawinan"] . '  </td>
                <td align="center">' . $rows["status_hubungan"] . '  </td>
                <td align="center">' . $rows["kewarganegaraan"] . '</td>
                <td align="center">' . $rows["no_paspor"] . '</td>
                <td align="center">' . $rows["no_kitas"] . '  </td>
                <td align="center">' . $rows["ayah"] . '</td>
                <td align="center">' . $rows["ibu"] . '</td>
            </tr>';
    $i++;
endforeach;
$html .= '
</table>
</div><br><br><br>
    <table width=100%>
        <tr>
            <td width= 50%; style="padding-left: 100px;"></td>
            <td></td>
            <td></td>
            <td align="right" style="padding-right: 100px;">' . tgl_indo(date("Y-m-d")) . ' </td>
        </tr>
    </table>
    <table width=100%>
        <tr>
            <td width= 25%; style="padding: 0 0 0 40px;">Lurah </td>
            <td width= 25%; style="padding: 20px;">Ketua RW </td>
            <td width= 25%; style="padding: 20px;">Ketua RT</td>
            <td width= 25%; style="padding: 20px;">Kepala Keluarga </td>
        </tr>
    ';
foreach ($kk as $row) :
    $html .= '
        <tr>
            <td width= 25%; style="padding: 50px 0 0 20px;">Vishnu Adisaka </td>
            <td width= 25%; style="padding: 50px 0 0 0px;">Siti Fatimah</td>
            <td width= 25%; style="padding: 50px 0 0 0px;">Riza Maqfiratun</td>
            <td width= 25%; style="padding: 50px 0 0 0px;">' . $row["nama_kepala"] . '</td>
        </tr>
    </table>
</body>
</html> 
';
endforeach;
$mpdf->AddPage('L');
$mpdf->WriteHTML($html);
$mpdf->Output("surat ktp", \Mpdf\Output\Destination::INLINE);
