<?php
// load
require 'functions.php';

if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambahkan atau tidak
    if (tambahKematian($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil pembuatan surat');
                document.location.href = '?page=konfirmasi&konfirmasi=kematian';
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
                        <h1 class="pt-5"><span>Form Pembuatan Surat Keterangan Kematian</span></h1>
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
                        <button type="submit" name="cari" class="btn btn-success btn-lg" onclick="location.href='?page=konfirmasi&konfirmasi=kematian'">Melihat No Bukti</button>
                    </div>
                    <br><br>
                    <hr>
                    <h2>Pembuatan Surat Keterangan Kematian</h2>
                    <h5>( ISI DATA DENGAN BENAR )</h5>
                </div>
            </div>
            <form action="" method="post">
                <h5>Yang bertanda tangan dibawah ini :</h5>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_lapor" class="col-sm-2 col-form-label text-black">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_lapor" id="nama_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Lengkap" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik_lapor" class="col-sm-2 col-form-label text-black">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik_lapor" id="nik_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NIK" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="umur_lapor" class="col-sm-2 col-form-label text-black">Umur</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="umur_lapor" id="umur_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Umur" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pekerjaan_lapor" class="col-sm-2 col-form-label text-black">pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="pekerjaan_lapor" id="pekerjaan_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pekerjaan" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rt_lapor" class="col-sm-2 col-form-label text-black">rt</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rt_lapor" id="rt_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rt" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rw_lapor" onkeypress="return hanyaAngka(event)" class="col-sm-2 col-form-label text-black">rw</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rw_lapor" id="rw_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rw" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa_lapor" class="col-sm-2 col-form-label text-black">desa</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa_lapor" id="desa_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="desa" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kec_lapor" class="col-sm-2 col-form-label text-black">kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kec_lapor" id="kec_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kec" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kab_lapor" class="col-sm-2 col-form-label text-black">kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kab_lapor" id="kab_lapor" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kab" required autocomplete="off">
                    </div>
                </div><br><br>
                <!-- hubungan -->
                <h5>Hubungan dengan yang mati</h5>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="hub" class="col-sm-2 col-form-label text-black">Hubungan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="hub" id="hub" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Hubungan dengan yang mati" required autocomplete="off">
                    </div>
                </div><br><br>
                <!-- melaporkan -->
                <h5>Melaporkan bahwa : </h5>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nama_mati" class="col-sm-2 col-form-label text-black">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="nama_mati" id="nama_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Nama Lengkap" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="nik_mati" class="col-sm-2 col-form-label text-black">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="nik_mati" id="nik_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="NIK" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="jk_mati" class="col-sm-2 col-form-label text-black">jenis kelamin</label>
                    <div class="col-sm-10">
                        <select id="inputState" class="form-control text-uppercase" name="jk_mati" id="jk_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="jenis kelamin" required autocomplete="off">
                            <option selected>L</option>
                            <option>P</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_mati" class="col-sm-2 col-form-label text-black">Tanggal Kelahiran</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_mati" id="tgl_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Tanggal kelahiran" required autocomplete="off">
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
                    <label for="rt_mati" class="col-sm-2 col-form-label text-black">rt</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rt_mati" id="rt_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rt" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="rw_mati" class="col-sm-2 col-form-label text-black">rw</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="rw_mati" id="rw_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="rw" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="desa_mati" class="col-sm-2 col-form-label text-black">desa</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="desa_mati" id="desa_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="desa" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kec_mati" class="col-sm-2 col-form-label text-black">kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kec_mati" id="kec_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kec" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="kab_mati" class="col-sm-2 col-form-label text-black">kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="kab_mati" id="kab_mati" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="kab" required autocomplete="off">
                    </div>
                </div><br><br>
                <!-- telah meninggal-->
                <h5>Telah meninggal dunia pada : </h5>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="hari" class="col-sm-2 col-form-label text-black">Hari</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return harusHuruf(event)" class="form-control text-uppercase" name="hari" id="hari" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Hari" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="tgl_kematian" class="col-sm-2 col-form-label text-black">Tanggal Kematian</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control text-uppercase" name="tgl_kematian" id="tgl_kematian" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="Date" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="pukul" class="col-sm-2 col-form-label text-black">pukul</label>
                    <div class="col-sm-10">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control text-uppercase" name="pukul" id="pukul" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="pukul" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="bertempat" class="col-sm-2 col-form-label text-black">bertempat di</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="bertempat" id="bertempat" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="bertempat di" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="penyebab" class="col-sm-2 col-form-label text-black">penyebab kematian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="penyebab" id="penyebab" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="penyebab kematian" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row font-weight-bold text-uppercase">
                    <label for="bukti" class="col-sm-2 col-form-label text-black">bukti kematian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control text-uppercase" name="bukti" id="bukti" oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')" placeholder="bukti kematian" required autocomplete="off">
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
