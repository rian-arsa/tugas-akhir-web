<?php

require 'functions.php';

$pengurus = query("SELECT * FROM pengurus");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .flip-card {
            background-color: transparent;
            width: 250px;
            height: 400px;
            perspective: 1000px;
            border-radius: 10%;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 10%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
            border-radius: 10%;
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 10%;
            backface-visibility: hidden;
        }

        .flip-card-front {
            background-color: #bbb;
            color: black;
            border-radius: 10%;
        }

        .flip-card-back {
            background-color: #0cb703;
            color: white;
            border-radius: 10%;
            transform: rotateY(180deg);
        }
    </style>
</head>

<body>
    <div class="top-shadow"></div>

    <div class="inner-page">
        <div class="slider-item" style="background-image: url('images/bg2.jpg');">

            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5"><span>Kepengurusan</span></h1>
                        <p class="mb-5 w-75 pl-0">Anggota</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <?php foreach ($pengurus as $row) : ?>
                    <div class="col-lg-3" style="border-radius:10%;">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="flip-card-front">
                                    <img src="img/<?= $row["gambar"] ?>" alt="Avatar" style="width:100%; border-radius:10%;">
                                </div>
                                <div class="flip-card-back">
                                    <br><br><br><br><br>
                                    <p><b><?= $row["prodi"] ?></b></p>
                                    <p><b><?= $row["offering"] ?></b></p>
                                    <p><b><?= $row["angkatan"] ?></b></p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <font color="black" align="center" size="4"><b><?= $row["nama"] ?></b>
                                <hr color="lime" align="center" size="5%">
                            </font>
                            <font color="black" align="center" size="4"><b><?= $row["jabatan"] ?></b>
                                <hr color="lime" align="center" size="5%">
                            </font>
                        </center>
                    </div>
                <?php endforeach; ?>
                <!-- 
                <div class="col-lg-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="images/riza.jpeg" alt="Avatar" style="width:100%; border-radius:10%;">
                            </div>
                            <div class="flip-card-back">
                                <br><br><br><br><br>
                                <p><b>S1 Teknik Informatika</b></p>
                                <p><b>Offering C</b></p>
                                <p><b>Angkatan 2018</b></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <font color="black" align="center" size="4"><b>Riza Maqfiratun Nafisah</b>
                            <hr color="lime" align="center" size="5%">
                        </font>
                    </center>
                </div>
                <div class="col-lg-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="images/ima.jpeg" alt="Avatar" style="width:100%; border-radius:10%;">
                            </div>
                            <div class="flip-card-back">
                                <br><br><br><br><br>
                                <p><b>S1 Teknik Informatika</b></p>
                                <p><b>Offering C</b></p>
                                <p><b>Angkatan 2018</b></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <font color="black" align="center" size="4"><b>Siti Fatimah</b>
                            <hr color="lime" align="center" size="5%">
                        </font>
                    </center>
                </div>
                <div class="col-lg-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="images/vishnu.jpeg" alt="Avatar" style="width:100%; border-radius:10%;">
                            </div>
                            <div class="flip-card-back">
                                <br><br><br><br><br>
                                <p><b>S1 Teknik Informatika</b></p>
                                <p><b>Offering C</b></p>
                                <p><b>Angkatan 2018</b></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <center>
                        <font color="black" align="center" size="4"><b>Vishnu Adisaka</b>
                            <hr color="lime" align="center" size="5%">
                        </font>
                    </center>
                </div> -->
            </div>
        </div>
    </section>
</body>

</html>