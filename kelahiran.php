<?php
// load
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahKelahiran($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil pembuatan surat');
                document.location.href = '?page=konfirmasi&konfirmasi=kelahiran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal pembuatan surat');
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>
    <div class="top-shadow"></div>

    <div class="inner-page">
        <div class="slider-item" style="background-image: url('images/bg2.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5"><span>Form Pembuatan Surat Keterangan Kelahiran</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->
    <section class="section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h4>Melihat nomor bukti pengambilan</h4>
                    <div class="row justify-content-center">
                        <button type="submit" name="cari" class="btn btn-success btn-lg" onclick="location.href='?page=konfirmasi&konfirmasi=kelahiran'">Melihat No Bukti</button>
                    </div>
                    <br><br>
                    <hr>
                    <h2>Pembuatan Surat Keterangan Kelahiran</h2>
                    <h5>( ISI DATA DENGAN BENAR )</h5>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_kk" class="col-sm-2 col-form-label text-black">Nama Kepala Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka" class="form-control text-uppercase" name="nama_kk" id="nama_kk" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama kepala keluarga" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="no_kk" class="col-sm-2 col-form-label text-black">Nomor Kartu Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="no_kk" id="no_kk" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nomor kartu keluarga" required autocomplete="off">
                    </div>
                </div>
                <h4>BAYI/ANAK</h4>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_anak" class="col-sm-2 col-form-label text-black">Nama Anak</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_anak" id="nama_anak" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama anak" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jk" class="col-sm-2 col-form-label text-black">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="jk" id="jk" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jenis kelamin" required autocomplete="off">
                            <option selected>L</option>
                            <option>P</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label text-black">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="tempat_lahir" id="tempat_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tempat lahir" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="hari" class="col-sm-2 col-form-label text-black">Hari</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="hari" id="hari" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="hari" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_lahir" id="tgl_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Date" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pukul" class="col-sm-2 col-form-label text-black">pukul</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="pukul" id="pukul" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pukul" value="00 : 00" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jenis_lahir" class="col-sm-2 col-form-label text-black">Jenis Kelahiran</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="jenis_lahir" id="jenis_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                            <option selected>Tungal</option>
                            <option>Kembar 2</option>
                            <option>Kembar 3</option>
                            <option>Kembar 4</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="ke" class="col-sm-2 col-form-label text-black">Kelahiran ke</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="ke" id="ke" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="penolong" class="col-sm-2 col-form-label text-black">Penolong Kelahiran</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="penolong" id="penolong" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                            <option selected>Dokter</option>
                            <option>Bidan / perawat</option>
                            <option>Dukun</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="berat" class="col-sm-2 col-form-label text-black">berat (kg)</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="berat" id="berat" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="berat" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="panjang" class="col-sm-2 col-form-label text-black">panjang (cm)</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="panjang" id="panjang" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="panjang" required autocomplete="off">
                    </div>
                </div><br>
                <h4>I B U</h4>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik_ibu" class="col-sm-2 col-form-label text-black">NIK </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik_ibu" id="nik_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nomor nik ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_ibu" class="col-sm-2 col-form-label text-black">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_ibu" id="nama_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_ibu" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_ibu" id="tgl_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="tanggal lahir ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pekerjaan_ibu" class="col-sm-2 col-form-label text-black">pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="pekerjaan_ibu" id="pekerjaan_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pekerjaan ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa_ibu" class="col-sm-2 col-form-label text-black">Desa </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa_ibu" id="desa_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Desa Ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kab_ibu" class="col-sm-2 col-form-label text-black">Kabupaten </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kab_ibu" id="kab_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kabupaten Ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kec_ibu" class="col-sm-2 col-form-label text-black">Kecamatan </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kec_ibu" id="kec_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kecamatan Ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="prov_ibu" class="col-sm-2 col-form-label text-black">Provinsi </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="prov_ibu" id="prov_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Provinsi Ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kewar_ibu" class="col-sm-2 col-form-label text-black">Kewarganegaraan </label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="kewar_ibu" id="kewar_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kewarganegaraan ibu" required autocomplete="off">
                            <option selected>wni</option>
                            <option>wna</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kebang_ibu" class="col-sm-2 col-form-label text-black">Kebangsaan </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kebang_ibu" id="kebang_ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kebangsaan Ibu" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_kawin" class="col-sm-2 col-form-label text-black">Tanggal Kawin</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_kawin" id="tgl_kawin" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="tanggal kawin" required autocomplete="off">
                    </div>
                </div><br>
                <h4>A Y A H</h4>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik_ayah" class="col-sm-2 col-form-label text-black">NIK </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik_ayah" id="nik_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nomor nik ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_ayah" class="col-sm-2 col-form-label text-black">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_ayah" id="nama_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_ayah" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_ayah" id="tgl_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="tanggal lahir ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pekerjaan_ayah" class="col-sm-2 col-form-label text-black">pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="pekerjaan_ayah" id="pekerjaan_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pekerjaan ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa_ayah" class="col-sm-2 col-form-label text-black">Desa </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa_ayah" id="desa_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Desa ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kab_ayah" class="col-sm-2 col-form-label text-black">Kabupaten </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kab_ayah" id="kab_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kabupaten ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kec_ayah" class="col-sm-2 col-form-label text-black">Kecamatan </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kec_ayah" id="kec_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kecamatan ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="prov_ayah" class="col-sm-2 col-form-label text-black">Provinsi </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="prov_ayah" id="prov_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Provinsi ayah" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kewar_ayah" class="col-sm-2 col-form-label text-black">Kewarganegaraan </label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="kewar_ayah" id="kewar_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kewarganegaraan ayah" required autocomplete="off">
                            <option selected>wni</option>
                            <option>wna</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kebang_ayah" class="col-sm-2 col-form-label text-black">Kebangsaan </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kebang_ayah" id="kebang_ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kebangsaan ayah" required autocomplete="off">
                    </div>
                </div><br>
                <h4>PELAPOR</h4>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik_lapor" class="col-sm-2 col-form-label text-black">NIK </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik_lapor" id="nik_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nomor nik pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_lapor" class="col-sm-2 col-form-label text-black">Nama </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_lapor" id="nama_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="umur" class="col-sm-2 col-form-label text-black">umur</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="umur" id="umur" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="umur lapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jk_lapor" class="col-sm-2 col-form-label text-black">jenis kelamin</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="jk_lapor" id="jk_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jenis kelamin pelapor"  autocomplete="off">
                            <option selected>L</option>
                            <option>P</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pekerjaan_lapor" class="col-sm-2 col-form-label text-black">pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="pekerjaan_lapor" id="pekerjaan_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pekerjaan pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa_lapor" class="col-sm-2 col-form-label text-black">Desa </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa_lapor" id="desa_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Desa pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kab_lapor" class="col-sm-2 col-form-label text-black">Kabupaten </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kab_lapor" id="kab_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kabupaten pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kec_lapor" class="col-sm-2 col-form-label text-black">Kecamatan </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kec_lapor" id="kec_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Kecamatan pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="prov_lapor" class="col-sm-2 col-form-label text-black">Provinsi </label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="prov_lapor" id="prov_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Provinsi pelapor"  autocomplete="off">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))

		    return false;
		  return true;
		}
    function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
	</script>
</body>

</html>
