<?php
// load 
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahData($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil penambahan anggota');
                document.location.href = '?page=konfirmasi&konfirmasi=kk';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal penambahan anggota');
            </script>
        ";
    }
}

if (isset($_POST["tambah"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahData($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil penambahan anggota');
                document.location.href = '?page=tambah_anggota';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal penambahan anggota');
            </script>
        ";
    }
}

$kk = query("SELECT * FROM kk ORDER BY id DESC LIMIT 1");

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
                        <h1 class="pt-5"><span>Form Tambah Anggota Keluarga</span></h1>
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
                    <h3>Masukkan Anggota Keluarga Dengan Benar</h3>
                    <hr>
                    <br>
                    <h5>DAFTAR ANGGOTA KELUARGA PEMOHON(hanya diisi anggota keluarga saja)</h5>
                </div>
            </div>
            <form action="" method="post">
                <?php foreach ($kk as $row) : ?>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control text-uppercase" name="nik" id="nik" value="<?= $row["nik"] ?>">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="nama" class="col-sm-2 col-form-label text-black">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="nama" id="nama" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Lengkap" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="nik_anggota" class="col-sm-2 col-form-label text-black">nomor nik</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="nik_anggota" id="nik_anggota" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nomor nik" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label text-black">jenis kelamin</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control text-uppercase" name="jenis_kelamin" id="jenis_kelamin" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jenis kelamin" required autocomplete="off">
                                <option selected>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label text-black">Tempat Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="tempat_lahir" id="tempat_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tempat Lahir" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control text-uppercase" name="tanggal_lahir" id="tanggal_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Date" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="agama" class="col-sm-2 col-form-label text-black">Agama</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control text-uppercase" name="agama" id="agama" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                                <option selected>islam</option>
                                <option>kristen</option>
                                <option>katolik</option>
                                <option>budha</option>
                                <option>hindu</option>
                                <option>khonghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="pendidikan" class="col-sm-2 col-form-label text-black">pendidikan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="pendidikan" id="pendidikan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pendidikan" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="pekerjaan" class="col-sm-2 col-form-label text-black">jenis pekerjaan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="pekerjaan" id="pekerjaan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pekerjaan" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="status_perkawinan" class="col-sm-2 col-form-label text-black">Status Perkawinan</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control text-uppercase" name="status_perkawinan" id="status_perkawinan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                                <option selected>belum kawin</option>
                                <option>kawin</option>
                                <option>Cerai Hidup</option>
                                <option>Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="status_hubungan" class="col-sm-2 col-form-label text-black">Status hubungan</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control text-uppercase" name="status_hubungan" id="status_hubungan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status hubungan" required autocomplete="off">
                                <option selected>KEPALA KELUARGA</option>
                                <option>ISTERI</option>
                                <option>ANAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="kewarganegaraan" class="col-sm-2 col-form-label text-black">Kewarganegaraan</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-control text-uppercase" name="kewarganegaraan" id="kewarganegaraan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                                <option selected>wni</option>
                                <option>wna</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="no_paspor" class="col-sm-2 col-form-label text-black">nomor paspor</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="no_paspor" id="no_paspor" placeholder="nomor paspor" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="no_kitas" class="col-sm-2 col-form-label text-black">nomor kitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="no_kitas" id="no_kitas" placeholder="nomor kitas" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="ayah" class="col-sm-2 col-form-label text-black">Nama orang tua (ayah)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="ayah" id="ayah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama orang tua ayah" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row font-weight-bold text-uppercase">
                        <label for="ibu" class="col-sm-2 col-form-label text-black">Nama orang tua (ibu)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-uppercase" name="ibu" id="ibu" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nama orang tua ibu" required autocomplete="off">
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Simpan & Selesai</button><span class="text-white">tambah</span>
                    <button type="submit" name="tambah" class="btn btn-success btn-lg">Simpan & Tambah Anggota</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>