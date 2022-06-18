<?php
require 'functions.php';

$info = query("SELECT * FROM info");

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
                        <h1 class="pt-5"><span>Info Tata Cara pembuatan Surat surat</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->

    <!-- KTP -->
    <?php foreach ($info as $row) : ?>
        <section class="section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2><?= $row["judul"] ?></h2>
                    </div>
                </div>
                <div class="row align-items-stretch">
                    <div class="col-lg-3 order-lg-1">
                        <!-- <div class="h-100">
                            <div class="frame h-100">
                                <div class="feature-img-bg h-100" style="background-image: url('images/p1.jpg');"></div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-md-9 col-lg-6 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                        <div class="feature-1 d-md-flex">
                            <div class="align-self-center">
                                <?= $row["isi"] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
</body>

</html>