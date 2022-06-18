<?php
require 'functions.php';

$id = $_GET["id"];

$artikel = query("SELECT * FROM artikel WHERE id = $id");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Oxygen:400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .background {
            width: 100%;
            height: 154px;
            background-image: url(../img/Capture.PNG);
            border-bottom: 10px solid black;
        }

        .halo img {
            max-width: 300px;
            max-height: 300px;
        }
    </style>

</head>

<body>
    <div class="background">
        <div class="logo">
            <a href="/tugasAkhirWeb/">
                <h1>ARTIKEL HARIAN</h1>
            </a>
        </div>
    </div>

    <?php foreach ($artikel as $row) : ?>
        <!-- <div class="backgroundd"> -->
        <div class="container">
            <div class="wrap">
                <div class="header align-content-stretch">
                    <h1 class="text-center"><?= $row["judul"]; ?></h1>
                    <h5 class="text-center">Artikel harian desa, <?= tgl_indo($row["tanggal"]); ?></h5>
                </div>
                <div class="menu text-center">
                    <div class="halo">
                        <img src="img/<?= $row["gambar"]; ?>" alt="">
                    </div>
                </div>
                <div class="badan">
                    <?= $row["isi"]; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- </div> -->
    <?php endforeach; ?>

    <footer class="site-footer bg-light" role="contentinfo">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4 mb-5">
                    <h3>Tentang Desaku</h3>
                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. .</p>
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
                            <span>Desa Aing, Kota Malang, Jawa Timut, Indonesia</span></li>
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