<?php

require 'functions.php';

$kk = query("SELECT * FROM kk ORDER BY id DESC");

if (isset($_POST["cari"])) {
    $kk = cariPembuatKk($_POST["keyword"]);
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
        <div class="slider-item" style="background-image: url('images/konfirmasi.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5"><span>Daftar Pembuat Kartu Keluarga (KK)</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->

    <section class="section blog">
        <div class="container">
            <form action="" method="post">
                <div class="form-group row font-weight-bold text-uppercase">
                    <h5 class="col-sm-12">Mencari Pembuat Kartu Keluarga (KK)</h5>
                    <input type="text" class="col-sm-6" placeholder="Masukkan keyword . . ." name="keyword" id="keyword" autocomplete="off">
                    <button type="submit" class="col-sm-1 btn btn-success" name="cari">Cari</button>
                </div>
            </form>
            <table class="table table-bordered text-center">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>No Bukti</th>
                        <th>Nama</th>
                        <th>No NIK</th>
                        <th>Jumlah Anggota</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Cetak Surat</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <!-- foreach digunakan  pengulangan khusus untuk array -->
                <tbody>
                    <?php foreach ($kk as $row) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["nama_kepala"] ?></td>
                            <td><?= $row["nik"] ?></td>
                            <td><?= $row["jumlah"] ?></td>
                            <td><?= $row["tgl_buat"] ?></td>
                            <td><?= $row["tgl_ambil"] ?></td>
                            <td><a href="cetak_kk.php?id=<?= $row["id"]; ?>" target="_blank" i class="fas fa-print text-info fa-2x"></i></a></td>
                            <td><a href="hapus.php?id=<?= $row["id"]; ?>&hapus=kk" onclick="return confirm('Mau dihapus ?')"><i class="fas fa-trash text-danger fa-2x"></i></a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</body>

</html>