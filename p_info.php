<?php

// load 
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahInfo($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Membuat Info Pelayanan');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Membuat Info Pelayanan');
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
                        <h1 class="pt-5"><span>Form Pembuatan Info Pelayanan desa</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->
    <section class="section">
        <div class="container">
            <div class="col-12 text-center">
                <h2>Membuat Info Desa</h2>
            </div>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="judul" class="col-sm-2 col-form-label text-black">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" id="judul" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Judul Kegiatan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="isi" class="col-sm-2 col-form-label text-black">Info</label>
                    <div class="col-sm-10">
                        <!-- <input type="textarea" rows="10" cols="70" class="form-control" name="isi" id="isi" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Isi" required autocomplete="off"> -->
                        <!-- <textarea name="isi" id="isi" cols="100" rows="10" style="width: 100%;" placeholder="Syarat Syarat Pelayanan"></textarea> -->
                        <textarea name="isi" id="summernote" placeholder="Tulis isi Artikel"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <script>
        $('#summernote').summernote({
            placeholder: 'Tuliskan isi artikel',
            tabsize: 2,
            height: 100
        });
    </script>
</body>

</html>