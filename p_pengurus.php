<?php

// load 
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahPengurus($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Membuat Pengurus');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Membuat Pengurus');
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

<body>
    <div class="top-shadow"></div>

    <div class="inner-page">
        <div class="slider-item" style="background-image: url('images/konfirmasi.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5"><span>Form Pengurus desa</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->
    <section class="section">
        <div class="container">
            <div class="col-12 text-center">
                <h2>Membuat Kegiatan Desa</h2>
            </div>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama" class="col-sm-2 col-form-label text-black">nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" id="nama" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="prodi" class="col-sm-2 col-form-label text-black">prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="prodi" id="prodi" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Prodi" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="offering" class="col-sm-2 col-form-label text-black">offering</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="offering" id="offering" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Offering" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="angkatan" class="col-sm-2 col-form-label text-black">angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="angkatan" id="angkatan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Angkatan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jabatan" class="col-sm-2 col-form-label text-black">jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan" id="jabatan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Jabatan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="gambar" class="col-sm-2 col-form-label text-black">gambar</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>