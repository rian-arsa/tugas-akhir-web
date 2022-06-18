<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desa Aing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header role="banner">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand " href="/tugasAkhirWeb/">DESA AING</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample05">
                    <ul class="navbar-nav pl-md-5 ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/tugasAkhirWeb/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=kegiatan">Kegiatan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=info">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=pengurus">Pengurus</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pelayanan Pembuatan</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="?page=ktp">Kartu Tanda Penduduk</a>
                                <a class="dropdown-item" href="?page=kk">Kartu Keluarga</a>
                                <a class="dropdown-item" href="?page=skck">Surat Pengantar Catatan Kepolisian</a>
                                <a class="dropdown-item" href="?page=usaha">Surat Keterangan Usaha</a>
                                <a class="dropdown-item" href="?page=mampu">Surat Tidak Mampu</a>
                                <a class="dropdown-item" href="?page=lahir">Surat Keterangan Lahir</a>
                                <a class="dropdown-item" href="?page=mati">Keterangan Kematian</a>
                                <a class="dropdown-item" href="?page=nikah">Surat Belum Menikah</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " href="login.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="login.php">Login</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- END header -->

    <?php
    // include "koneksi.php";
    // include "fungsi.php";
    isset($_GET["page"]) ? $page = $_GET["page"] : $page = "";

    if ($page == "") {
        include "home.php";
    } elseif ($page == "kegiatan") {
        include "kegiatan.php";
    } elseif ($page == "info") {
        include "info.php";
    } elseif ($page == "ktp") {
        include "ktp.php";
    } elseif ($page == "konfirmasi") {
        include "konfirmasi.php";
    } elseif ($page == "lahir") {
        include "kelahiran.php";
    } elseif ($page == "mati") {
        include "mati.php";
    } elseif ($page == "skck") {
        include "skck.php";
    } elseif ($page == "usaha") {
        include "usaha.php";
    } elseif ($page == "mampu") {
        include "mampu.php";
    } elseif ($page == "nikah") {
        include "nikah.php";
    } elseif ($page == "kk") {
        include "kk.php";
    } elseif ($page == "tambah_anggota") {
        include "tambah_anggota.php";
    } elseif ($page == "pengurus") {
        include "pengurus.php";
    } else {
        echo "Halaman Tidak Ditemukan";
    }
    ?>


    <footer class="site-footer bg-light" role="contentinfo">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4 mb-5">
                    <h3>Tentang Desaku</h3>
                    <p class="mb-5">Desa ini didirikan tahun 1990 oleh Rian dan temannya yaitu Vishnu, Riza, dan Ima. Desa ini dibangun mulai ketika 4 orang ini melakukan penelitian disebuah hutan yang sangat indah. Desa ini mempunyai banyak tempat wisata yang sangat indah. Teknologi desa sangat cepat berkembang.</p>
                    <ul class="list-unstyled footer-link d-flex footer-social">
                        <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
                    </ul>

                </div>
                <div class="col-md-5 mb-5 pl-md-5">
                    <h3>Desa Aing</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-block">
                            <span class="d-block">Alamat :</span>
                            <span>Desa Aing, Kota Malang, Jawa Timur, Indonesia</span></li>
                        <li class="d-block"><span class="d-block">Telephone:</span><span>+9423 4942 290</span></li>
                        <li class="d-block"><span class="d-block">Email:</span><span>desaaing@gmail.desa.com</span></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-5">
                    <h3>Pilihan menu</h3>
                    <ul class="list-unstyled footer-link">
                        <li><a href="/tugasAkhirWeb/" class="text-black">Home</a></li>
                        <li><a href="?page=kegiatan" class="text-black">Kegiatan</a></li>
                        <li><a href="?page=info" class="text-black">Info</a></li>
                        <li><a href="?page=pengurus" class="text-black">Pengurus</a></li>
                    </ul>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
                <div class="col-12 text-md-center text-left">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <i class="fa fa-heart" aria-hidden="true"></i> <span class="text-black">Vishnu | Rian | Siti | Riza</span>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- END footer -->

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214" /></svg></div>

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
