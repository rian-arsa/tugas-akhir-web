<?php

require 'functions.php';

$artikel = query("SELECT * FROM artikel ORDER BY id DESC");
$wisata = query("SELECT * FROM wisata");

if (isset($_POST["submit"])) {

  //cek apakah data berhasil ditambahkan atau tidak
  if (tambahKritik($_POST) > 0) {
      echo "
          <script>
              alert('Berhasil Membuat Kritik dan Saran');
          </script>
      ";
  } else {
      echo "
          <script>
              alert('Gagal Membuat Kritik dan Saran');
          </script>
      ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Home-Desa Aing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <div class="top-shadow"></div>
  <!-- Slider atau tampilan Awal -->
  <section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url('images/bg1.jpg');">
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-lg-7 text-center col-sm-12 element-animate">
            <h1 class="mb-4"><span>DESA AING</span></h1>
            <p class="mb-5 w-75">Pemandangan yang luar biasa, indah dan nyaman</p>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-item" style="background-image: url('images/bg2.jpg');">
      <div class="container">
        <div class="row slider-text align-items-center justify-content-center">
          <div class="col-lg-7 text-center col-sm-12 element-animate">
            <h1><span>DESA AING</span></h1>
            <p class="mb-5 w-75">Desa Pariwisata dan Desa Teknologi</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Section Awal -->
  <section class="section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4 element-animate ">
          <div class="media block-6 d-block text-center">
            <div class="icon mb-3"><span class="ion-ios-home text-success"></span></div>
            <div class="media-body">
              <h3 class="heading">Desa Bersih</h3>
              <p>Desa Bersih menciptakan masyarakat yang sehat.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 element-animate ">
          <div class="media block-6 d-block text-center">
            <div class="icon mb-3"><span class="ion-heart text-success"></span></div>
            <div class="media-body">
              <h3 class="heading">Desa Sehat</h3>
              <p>Desa Sehat menciptakan masyarakat yang cerdas, berkualitas, dan selalu ceria.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 element-animate ">
          <div class="media block-6 d-block text-center">
            <div class="icon mb-3"><span class="ion-leaf text-success"></span></div>
            <div class="media-body">
              <h3 class="heading">Desa Go Green</h3>
              <p>Menciptakan keindahan kehijauan terhadap ekosistem yang sangat cantik.</p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="section border-t pb-0">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-8 text-center">
          <h2 class=" heading mb-4">Daftar Pelayanan</h2>
          <p class="mb-5 lead">Daftar pelayanan bagi penduduk Desa Aing.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-md-3 element-animate">
          <a href="?page=ktp" class="link-thumbnail">
            <h3>Pembuatan KTP</h3>
            <span class="ion-plus icon"></span>
            <img src="images/ktp.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=kk" class="link-thumbnail">
            <h3>Pembuatan Kartu Keluarga</h3>
            <span class="ion-plus icon"></span>
            <img src="images/kk.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=skck" class="link-thumbnail">
            <h3>Pembuatan Surat Pengantar SKCK</h3>
            <span class="ion-plus icon"></span>
            <img src="images/skck.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=lahir" class="link-thumbnail">
            <h3>Pembuatan Akta kelahiran</h3>
            <span class="ion-plus icon"></span>
            <img src="images/lahir.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=mati" class="link-thumbnail">
            <h3>Pembuatan Keterangan Kematian</h3>
            <span class="ion-plus icon"></span>
            <img src="images/mati.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=nikah" class="link-thumbnail">
            <h3>Pembuatan Surat Belum Menikah</h3>
            <span class="ion-plus icon"></span>
            <img src="images/nikah.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=usaha" class="link-thumbnail">
            <h3>Pembuatan Surat Izin Usaha</h3>
            <span class="ion-plus icon"></span>
            <img src="images/usaha.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
        <div class="col-md-3 element-animate">
          <a href="?page=mampu" class="link-thumbnail">
            <h3>Pembuatan Surat Keterangan Tidak Mampu</h3>
            <span class="ion-plus icon"></span>
            <img src="images/mampu.PNG" alt="Image" class="img-fluid">
          </a>
        </div>
      </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 text-center">
          <h2>Potensi Desa</h2>
        </div>
      </div>
      <div class="row align-items-stretch">
        <div class="col-lg-4 order-lg-1">
          <div class="h-100">
            <div class="frame h-100">
              <div class="feature-img-bg h-100" style="background-image: url('images/p1.jpg');"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
          <div class="feature-1 d-md-flex">
            <div class="align-self-center">
              <span class="ion ion-leaf display-4 text-success"></span>
              <h3>Desa Hijau</h3>
              <p>Desa yang kaya akan tumbuhan dan sumber daya alam.</p>
            </div>
          </div>
          <div class="feature-1 d-md-flex">
            <div class="align-self-center">
              <span class="ion ion-android-bulb display-4 text-success"></span>
              <h3>Penduduk Brilian</h3>
              <p>Desa yang kaya akan penduduk yang berprestasi.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
          <div class="feature-1 d-md-flex">
            <div class="align-self-center">
              <span class="ion ion-alert-circled display-4 text-success"></span>
              <h3>Kemajuan Infrastruktur</h3>
              <p>Infrastruktur desa yang maju.</p>
            </div>
          </div>
          <div class="feature-1 d-md-flex">
            <div class="align-self-center">
              <span class="ion ion-android-happy display-4 text-success"></span>
              <h3>Nyaman dan Santuy</h3>
              <p>Memberikan kenyamanan bagi penduduk sehingga penduduk hidup santuy.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section border-t pb-0">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-8 text-center">
          <h2 class=" heading mb-4">Wisata Desa</h2>
          <p class="mb-5 lead">Tempat wisata desa adalah suatu tempat yang digunakan semua masyarakat Indonesia untuk melakukan kegiatan wisata. Tempat wisata di desa ini berupa tempat wisata alam dan bangunan. Tempat wisata alam dapat berupa pantai, gunung, dan lain-lain, sedangkan tempat wisata bangunan dapat berupa peninggalan sejarah, museum, dan lain-lain.</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row no-gutters">
       <?php foreach ($wisata as $row) : ?>
        <div class="col-md-4 element-animate">
          <a href="<?= $row["link"] ?>" target="_blank" class="link-thumbnail">
            <h3><?= $row["nama"] ?></h3>
            <span class="ion-plus icon"></span>
            <img src="img/<?= $row["gambar"] ?>" alt="Image" class="img-fluid">
          </a>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- END section -->

  <section class="section blog">
    <div class="container">
      <div class="row justify-content-center mb-5 element-animate">
        <div class="col-md-8 text-center">
          <h2 class=" heading mb-4">Artikel Harian Desa</h2>
          <p class="mb-5 lead">Baca Artikel Harian Desa Aing, dapatkan berbagai informasi dan wawasan.</p>
        </div>
      </div>
      <div class="row">
        <?php foreach ($artikel as $row) : ?>
          <div class="col-md-6">
            <div class="media mb-4 d-md-flex d-block element-animate">
              <a href="lengkap.php?id=<?= $row["id"] ?>" class="mr-5"><img style="max-width: 200px; min-width: 200px; min-height: 200px; max-height: 200px;" src="img/<?= $row["gambar"] ?>" alt="" class="img-fluid"></a>
              <div class="media-body">
                <span class="post-meta"><?= tgl_indo($row["tanggal"]) ?></span>
                <h3 class="mt-2 text-black"><a href="lengkap.php?id=<?= $row["id"] ?>" class="text-black"><?= $row["judul"] ?></a></h3>
                <p><a href="lengkap.php?id=<?= $row["id"] ?>" class="readmore text-black">Baca lanjut <span class="ion-android-arrow-dropright-circle"></span></a></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <!-- Contact -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-2 col-md-12 text-center">
          <div class="section-heading">
            <h2>Kritik Dan Saran</h2>
            <div class="heading-line"></div>
            <p>Untuk membangun desa yang baik dibutuhkan kontribusi dari masyarakat</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-offset-2 col-md-12  text-center ">
          <div id="sendmessage">Kirim pesanmu... Terimakasih</div>
          <br>
          <div class="justify-content-center">
            <form action="" method="post">
              <div class="col-md-offset col-md-12">
                <div class="form-group">
                  <input type="text" autocomplete="off" name="nama" class="form-control" id="name" placeholder="Nama" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                </div>
              </div>
              <div class="col-md-offset-2 col-md-12">
                <div class="form-group">
                  <textarea class="form-control" autocomplete="off" name="isi" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Pesan Kritik dan Saran"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-offset-2 col-md-12">
                  <button type="submit" class="btn btn-theme btn-lg btn-block" name="submit">Kirim</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>

    </div>
  </section>

</body>

</html>
