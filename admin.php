<?php
session_start();

if (!isset($_SESSION['session_username'])) {
    header("Location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Desa Aing</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">


    <!-- include libraries(jQuery, bootstrap) -->

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</head>
</head>

<body>
    <header role="banner" id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand " href="admin.php">DESA AING</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav pl-md-5 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?halaman=artikel">Buat Artikel</a>
                                <a class="dropdown-item" href="?halaman=artikel1">Daftar Artikel</a>
                                <a class="dropdown-item" href="?halaman=info">Buat Info</a>
                                <a class="dropdown-item" href="?halaman=info1">Daftar Info</a>
                                <a class="dropdown-item" href="?halaman=kegiatan">Buat Kegiatan</a>
                                <a class="dropdown-item" href="?halaman=kegiatan1">Daftar Kegiatan</a>
                                <a class="dropdown-item" href="?halaman=wisata">Buat WIsata</a>
                                <a class="dropdown-item" href="?halaman=wisata1">Daftar Wisata</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tampilkan</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?halaman=daftarktp">Daftar Pembuat KTP</a>
                                <a class="dropdown-item" href="?halaman=kk">Daftar Pembuat KK</a>
                                <a class="dropdown-item" href="?halaman=skck">Daftar Pembuat SPCK</a>
                                <a class="dropdown-item" href="?halaman=usaha">Daftar Pembuat Keterangan Usaha</a>
                                <a class="dropdown-item" href="?halaman=mampu">Daftar Pembuat Surat Tidak Mampu</a>
                                <a class="dropdown-item" href="?halaman=lahir">Daftar Pembuat Keterangan Lahir</a>
                                <a class="dropdown-item" href="?halaman=mati">Daftar Pembuat Keterangan Kematian</a>
                                <a class="dropdown-item" href="?halaman=nikah">Daftar Pembuat Belum Menikah</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pengurus</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?halaman=pengurus">Buat Pengurus Desa</a>
                                <a class="dropdown-item" href="?halaman=pengurus1">Daftar Pengurus Desa</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="?halaman=kritik">Kritik dan Saran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php
    // include "koneksi.php";
    // include "fungsi.php";
    isset($_GET["halaman"]) ? $halaman = $_GET["halaman"] : $halaman = "";

    if ($halaman == "") {
        include "home1.php";
    } elseif ($halaman == "daftarktp") {
        include "pembuat_ktp.php";
    } elseif ($halaman == "lahir") {
        include "pembuat_lahir.php";
    } elseif ($halaman == "mati") {
        include "pembuat_mati.php";
    } elseif ($halaman == "skck") {
        include "pembuat_skck.php";
    } elseif ($halaman == "usaha") {
        include "pembuat_usaha.php";
    } elseif ($halaman == "mampu") {
        include "pembuat_mampu.php";
    } elseif ($halaman == "nikah") {
        include "pembuat_nikah.php";
    } elseif ($halaman == "acara") {
        include "pembuat_acara.php";
    } elseif ($halaman == "artikel") {
        include "pembuat_artikel.php";
    } elseif ($halaman == "struktur") {
        include "pembuat_struktur.php";
    } elseif ($halaman == "artikel1") {
        include "tampil_artikel.php";
    } elseif ($halaman == "kegiatan") {
        include "p_kegiatan.php";
    } elseif ($halaman == "kegiatan1") {
        include "tampil_kegiatan.php";
    } elseif ($halaman == "pengurus") {
        include "p_pengurus.php";
    } elseif ($halaman == "pengurus1") {
        include "tampil_pengurus.php";
    } elseif ($halaman == "info") {
        include "p_info.php";
    } elseif ($halaman == "info1") {
        include "tampil_info.php";
    } elseif ($halaman == "kk") {
        include "pembuat_kk.php";
    } elseif ($halaman == "kritik") {
        include "tampil_kritik.php";
    } elseif ($halaman == "wisata") {
        include "p_wisata.php";
    } elseif ($halaman == "wisata1") {
        include "tampil_wisata.php";
    } else {
        echo "Halaman Tidak Ditemukan";
    }
    ?>


    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" /></svg></div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/main.js"></script>

    <script src="js/main.js"></script>
</body>

</html>
