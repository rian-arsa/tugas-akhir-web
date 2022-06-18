<?php
require 'functions.php';

$kegiatan = query("SELECT * FROM kegiatan");

?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
  <div class="top-shadow"></div>

  <div class="inner-page">
    <div class="slider-item" style="background-image: url('images/bg2.jpg');">
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
            <h1 class="pt-5"><span>Jadwal Kegiatan Desa Aing</span></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END slider -->

  <section class="section">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-8 text-center">
          <h2 class="heading mb-4">Jadwal Kegiatan Desa</h2>
          <p class="mb-5 lead">Jadwal tersedia disini dan bisa dipercaya info kegiatan ini</p>
        </div>
      </div>
      <?php foreach ($kegiatan as $row) : ?>
        <section class="section">
          <div class="container">
            <div class="row align-items-stretch">
              <div class="col-lg-3 order-lg-1">
                <div class="h-100">
                  <div class="frame h-100">
                    <div class="feature-img-bg h-100" style="background-image: url('img/<?= $row["gambar"] ?>');"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-lg-6 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                <div class="feature-1 d-md-flex">
                  <div class="align-self-center">
                    <h3><?= $row["judul"] ?></h3>
                    <table>
                      <tr>
                        <td>Tanggal</td>
                        <td> : </td>
                        <td><?= tgl_indo($row["tanggal"]) ?></td>
                      </tr>
                      <tr>
                        <td>Tempat</td>
                        <td> : </td>
                        <td><?= $row["tempat"] ?></td>
                      </tr>
                    </table>
                    <p><?= $row["isi"] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endforeach; ?>

  </section>
  <!-- END section -->
</body>

</html>