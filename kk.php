<?php
// load
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahKk($_POST) > 0) {
        echo "
            <script>
                alert('Tambahkan Anggota');
                document.location.href = '?page=tambah_anggota';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal pembuatan surat');
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
</head>

<body>
    <div class="top-shadow"></div>

    <div class="inner-page">
        <div class="slider-item" style="background-image: url('images/bg2.jpg');">
            <div class="container">
                <div class="row slider-text align-items-center justify-content-center">
                    <div class="col-md-8 text-center col-sm-12 element-animate pt-5">
                        <h1 class="pt-5"><span>Form Pembuatan Kartu Keluarga (KK)</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END slider -->
    <section class="section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h4>Melihat nomor bukti pengambilan</h4>
                    <div class="row justify-content-center">
                        <button type="submit" name="cari" class="btn btn-success btn-lg" onclick="location.href='?page=konfirmasi&konfirmasi=kk'">Melihat No Bukti</button>
                    </div>
                    <br><br>
                    <hr>
                    <h2>Pembuatan Kartu Keluarga (KK)</h2>
                    <h5>( ISI DATA DENGAN BENAR )</h5>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_kepala" class="col-sm-2 col-form-label text-black">Nama Kepala Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="nama_kepala" id="nama_kepala" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Kepala Keluarga" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik" class="col-sm-2 col-form-label text-black">N I K Kepala Keluarga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="nik" id="nik" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="N I K Kepala Keluarga" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="alamat" class="col-sm-2 col-form-label text-black">alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="alamat" id="alamat" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="alamat" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rt" class="col-sm-2 col-form-label text-black">RT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="rt" id="rt" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rt" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rw" class="col-sm-2 col-form-label text-black">RW</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="rw" id="rw" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rw" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa" class="col-sm-2 col-form-label text-black">desa / kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="desa" id="desa" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="desa" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kecamatan" class="col-sm-2 col-form-label text-black">kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="kecamatan" id="kecamatan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kecamatan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kabupaten" class="col-sm-2 col-form-label text-black">kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="kabupaten" id="kabupaten" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kabupaten" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="prov" class="col-sm-2 col-form-label text-black">propinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="prov" id="prov" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="propinsi" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kode_pos" class="col-sm-2 col-form-label text-black">kode pos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="kode_pos" id="kode_pos" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kode pos" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="telepon" class="col-sm-2 col-form-label text-black">Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="telepon" id="telepon" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Telepon" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jumlah" class="col-sm-2 col-form-label text-black">Jumlah Anggota keluarga</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control text-uppercase" name="jumlah" id="jumlah" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jumlah anggota keluarga" required autocomplete="off">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Tambah Anggota</button>
                </div>
            </form>
        </div>
    </section>
    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))

		    return false;
		  return true;
		}
    function harusHuruf(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
	</script>
</body>

</html>
