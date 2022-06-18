<?php
require 'functions.php';

$warga = query("SELECT * FROM warga LIMIT 0");

$ket = $_GET["konfirmasi"];
if ("kelahiran" == $ket) {
    $judul = "Keterangan Lahir";
    if (isset($_POST["cari"])) {
        $warga = cariKelahiran($_POST["keyword"]);
        $ket1 = "2. Membawa Fotocopy KTP kedua orang tua";
        $ket2 = "3. Membawa KK";
        $ket3 = "4. Membawa Fotocopy 1 orang saksi";
        $ket4 = "5. Membawa surat keterangan lahir dari dokter (yang menerangkan Berat Bayi, Panjang Bayi, Jam Lahir, dll)";
        $ket5 = "";
    }
} elseif ("ktp" == $ket) {
    $judul = "Kartu Tanda Penduduk (KTP)";
    if (isset($_POST["cari"])) {
        $warga = cariKtp($_POST["keyword"]);
        $ket1 = "2. Membawa Fotocopy KK";
        $ket2 = "3. Membawa Fotocopy Akte Kelahiran";
        $ket3 = "";
        $ket4 = "";
        $ket5 = "";
    }
} elseif ("kematian" == $ket) {
    $judul = "Keterangan Kematian";
    if (isset($_POST["cari"])) {
        $warga = cariKematian($_POST["keyword"]);
        $ket1 = "2. Membawa Fotocopy E-KTP orang yang meninggal";
        $ket2 = "3. Membawa Fotocopy KK orang yang meninggal";
        $ket3 = "4. Fotocopy E-KTP 1 orang saksi";
        $ket4 = "5. Fotocopy E-KTP Kedua orang tua (jika orang tua sudah meninggal ditulis nama dan tanggal lahir orang tua)";
        $ket5 = "";
    }
} elseif ("skck" == $ket) {
    $judul = "Pengantar SKCK";
    if (isset($_POST["cari"])) {
        $warga = cariSkck($_POST["keyword"]);
        $ket1 = "2. Membawa surat pengantar dari RT";
        $ket2 = "3. Membawa Fotocopy KTP";
        $ket3 = "4. Fotocopy KK";
        $ket4 = "";
        $ket5 = "";
    }
} elseif ("usaha" == $ket) {
    $judul = "Keterangan Usaha";
    if (isset($_POST["cari"])) {
        $warga = cariUsaha($_POST["keyword"]);
        $ket1 = "2. Membawa surat pengantar dari RT";
        $ket2 = "3. Membawa Fotocopy KTP";
        $ket3 = "4. Fotocopy KK";
        $ket4 = "";
        $ket5 = "";
    }
} elseif ("mampu" == $ket) {
    $judul = "Keterangan Tidak Mampu";
    if (isset($_POST["cari"])) {
        $warga = cariMampu($_POST["keyword"]);
        $ket1 = "2. Membawa surat pengantar dari RT";
        $ket2 = "3. Membawa Fotocopy KTP";
        $ket3 = "4. Fotocopy KK";
        $ket4 = "";
        $ket5 = "";
    }
} elseif ("nikah" == $ket) {
    $judul = "Keterangan Belum Menikah";
    if (isset($_POST["cari"])) {
        $warga = cariNikah($_POST["keyword"]);
        $ket1 = "2. Membawa surat pengantar dari RT";
        $ket2 = "3. Membawa Fotocopy KTP";
        $ket3 = "4. Fotocopy KK";
        $ket4 = "";
        $ket5 = "";
    }
} elseif ("kk" == $ket) {
    $judul = "Kartu Keluarga (KK)";
    if (isset($_POST["cari"])) {
        $warga = cariKk($_POST["keyword"]);
        $ket1 = "2. Membawa surat pengantar dari RT";
        $ket2 = "3. Membawa Fotocopy KTP";
        $ket3 = "4. Fotocopy KK";
        $ket4 = "";
        $ket5 = "";
    }
} else {
    $judul = "";
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
                        <h1 class="pt-5"><span>Tanda bukti konfirmasi pengambilan surat <?= $judul ?></span></h1>
                        <?php foreach ($warga as $row) : ?>
                            <tr>
                                <td>
                                    <h3 class="text-white">No bukti : <?= $row["id"] ?></h3>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                    <h5 class="col-sm-12">Melihat No bukti untuk pengambilan surat :</h5>
                    <label for="keyword" class="col-sm-3 text-black">Masukkan Nomor NIK</label>
                    <input type="text" class="col-sm-7" placeholder="Masukkan no NIK . . ." name="keyword" id="keyword" autocomplete="off">
                    <button type="submit" class="col-sm-2 btn btn-success" name="cari">Cari</button>
                </div>
            </form>
            <br><br>

            <?php foreach ($warga as $row) : ?>
                <div class="row justify-content-center mb-5 element-animate">
                    <div class="col-md-8 text-center">
                        <h2 class=" heading mb-4">No bukti sebagai bukti pengambilan surat</h2>
                        <h5>Bukti diatas bisa ditulis atau disimpan(screenshot)</h5>
                        <h5>Pembuatan : <?= tgl_indo($row["tgl_buat"]); ?></h5><br><br>
                        <h5>Syarat pengambilan :</h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <table>
                        <tr>
                            <td>
                                <h5>1. pengambilan : <?= tgl_indo($row["tgl_ambil"]); ?></h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>
                                    <h5><?= $ket1 ?></h5>
                            </td>
                        </tr>
                        <td>
                            <h5>
                                <h5><?= $ket2 ?></h5>
                        </td>
                        </tr>
                        <td>
                            <h5>
                                <h5><?= $ket3 ?></h5>
                        </td>
                        </tr>
                        <td>
                            <h5>
                                <h5><?= $ket4 ?></h5>
                        </td>
                        </tr>
                        <td>
                            <h5>
                                <h5><?= $ket5 ?></h5>
                        </td>
                        </tr>
                    </table>


                    <!-- <ol>
                        <li>
                            <h5></h5>
                        </li>
                        <li>
                            <h5></h5>
                        </li>
                        <li>
                            <h5>Membawa Fotocopy Akte</h5>
                        </li>
                        <li>
                            <h5>Menunjukkan nomor bukti</h5>
                        </li>
                    </ol> -->
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</body>

</html>