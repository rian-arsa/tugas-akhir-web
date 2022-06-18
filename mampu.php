<?php
// load
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahMampu($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil pembuatan surat');
                document.location.href = '?page=konfirmasi&konfirmasi=mampu';
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
                        <h1 class="pt-5"><span>Form Pembuatan Surat Tidak Mampu</span></h1>
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
                        <button type="submit" name="cari" class="btn btn-success btn-lg" onclick="location.href='?page=konfirmasi&konfirmasi=mampu'">Melihat No Bukti</button>
                    </div>
                    <br><br>
                    <hr>
                    <h2>Pembuatan Surat Tidak Mampu</h2>
                    <h5>( ISI DATA DENGAN BENAR )</h5>
                </div>
            </div>
            <form action="" method="post">
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama" class="col-sm-2 col-form-label text-black">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama" id="nama" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Lengkap" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik" class="col-sm-2 col-form-label text-black">nik</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik" id="nik" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="nik" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tempat_lahir" class="col-sm-2 col-form-label text-black">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="tempat_lahir" id="tempat_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tempat Lahir" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_lahir" class="col-sm-2 col-form-label text-black">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_lahir" id="tgl_lahir" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Date" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label text-black">jenis kelamin</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="jenis_kelamin" id="jenis_kelamin" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jenis kelamin" required autocomplete="off">
                            <option selected>L</option>
                            <option>P</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="agama" class="col-sm-2 col-form-label text-black">Agama</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="agama" id="agama" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                            <option selected>islam</option>
                            <option>kristen</option>
                            <option>katolik</option>
                            <option>budha</option>
                            <option>hindu</option>
                            <option>khonghucu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="status_perkawinan" class="col-sm-2 col-form-label text-black">Status Perkawinan</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="status_perkawinan" id="status_perkawinan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Status Perkawinan" required autocomplete="off">
                            <option selected>belum kawin</option>
                            <option>kawin</option>
                            <option>Cerai Hidup</option>
                            <option>Cerai Mati</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pekerjaan" class="col-sm-2 col-form-label text-black">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="pekerjaan" id="pekerjaan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Pekerjaan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rt" class="col-sm-2 col-form-label text-black">RT</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rt" id="rt" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rt" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rw" class="col-sm-2 col-form-label text-black">RW</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rw" id="rw" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rw" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa" class="col-sm-2 col-form-label text-black">desa / kelurahan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa" id="desa" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="desa" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kecamatan" class="col-sm-2 col-form-label text-black">kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kecamatan" id="kecamatan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kecamatan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kabupaten" class="col-sm-2 col-form-label text-black">kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kabupaten" id="kabupaten" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kabupaten" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="keperluan" class="col-sm-2 col-form-label text-black">keperluan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="keperluan" id="keperluan" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="keperluan" required autocomplete="off">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Submit</button>
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
