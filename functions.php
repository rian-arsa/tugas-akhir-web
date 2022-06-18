<?php

$conn = mysqli_connect("localhost", "root", "", "ta_web");

function query($query)
{
    // mengambil $conn global 
    global $conn;
    // mysqli_query digunakan untuk menuliskan query sql
    $result = mysqli_query($conn, $query);
    $rows = [];
    // mysqli_fetch_assoc digunakan untuk menjadikan array assoc
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    // mengembalikan nilai 
    return $rows;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

// function untuk menambahkan data ktp
function tambahKtp($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = ucfirst(htmlspecialchars($data["nama"]));
    $no_nik = ucfirst(htmlspecialchars($data["no_nik"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $tanggal_lahir = ucfirst(htmlspecialchars($data["tanggal_lahir"]));
    $jenis_kelamin = ucfirst(htmlspecialchars($data["jenis_kelamin"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $kewarganegaraan = strtoupper(htmlspecialchars($data["kewarganegaraan"]));
    $pekerjaan = ucfirst(htmlspecialchars($data["pekerjaan"]));
    $status_perkawinan = ucfirst(htmlspecialchars($data["status_perkawinan"]));
    $rt = ucfirst(htmlspecialchars($data["rt"]));
    $rw = ucfirst(htmlspecialchars($data["rw"]));
    $desa = ucfirst(htmlspecialchars($data["desa"]));
    $kecamatan = ucfirst(htmlspecialchars($data["kecamatan"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO warga VALUES ('','$nama','$no_nik','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$kewarganegaraan','$pekerjaan','$status_perkawinan','$rt', '$rw', '$desa', '$kecamatan', '$hari_ini', '$pengambilan','')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariKtp($keyword)
{
    $query = "SELECT * FROM warga WHERE no_nik LIKE '$keyword'";

    return query($query);
}

function hapusKtp($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM warga WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKtp($keyword)
{
    $query = "SELECT * FROM warga WHERE nama LIKE '%$keyword%' OR no_nik LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%'";

    return query($query);
}


// function untuk menambahkan data kelahiran
function tambahKelahiran($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama_kk = ucfirst(htmlspecialchars($data["nama_kk"]));
    $no_kk = ucfirst(htmlspecialchars($data["no_kk"]));
    // anak/bayi
    $nama_anak = ucfirst(htmlspecialchars($data["nama_anak"]));
    $jk = ucfirst(htmlspecialchars($data["jk"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $hari = ucfirst(htmlspecialchars($data["hari"]));
    $tgl_lahir = ucfirst(htmlspecialchars($data["tgl_lahir"]));
    $pukul = ucfirst(htmlspecialchars($data["pukul"]));
    $jenis_lahir = ucfirst(htmlspecialchars($data["jenis_lahir"]));
    $ke = ucfirst(htmlspecialchars($data["ke"]));
    $penolong = ucfirst(htmlspecialchars($data["penolong"]));
    $berat = ucfirst(htmlspecialchars($data["berat"]));
    $panjang = ucfirst(htmlspecialchars($data["panjang"]));
    // ibu
    $nik_ibu = ucfirst(htmlspecialchars($data["nik_ibu"]));
    $nama_ibu = ucfirst(htmlspecialchars($data["nama_ibu"]));
    $tgl_ibu = ucfirst(htmlspecialchars($data["tgl_ibu"]));
    $pekerjaan_ibu = ucfirst(htmlspecialchars($data["pekerjaan_ibu"]));
    $desa_ibu = ucfirst(htmlspecialchars($data["desa_ibu"]));
    $kab_ibu = ucfirst(htmlspecialchars($data["kab_ibu"]));
    $kec_ibu = ucfirst(htmlspecialchars($data["kec_ibu"]));
    $prov_ibu = ucfirst(htmlspecialchars($data["prov_ibu"]));
    $kewar_ibu = ucfirst(htmlspecialchars($data["kewar_ibu"]));
    $kebang_ibu = ucfirst(htmlspecialchars($data["kewar_ibu"]));
    $tgl_kawin = ucfirst(htmlspecialchars($data["tgl_kawin"]));
    // ayah
    $nik_ayah = ucfirst(htmlspecialchars($data["nik_ayah"]));
    $nama_ayah = ucfirst(htmlspecialchars($data["nama_ayah"]));
    $tgl_ayah = ucfirst(htmlspecialchars($data["tgl_ayah"]));
    $pekerjaan_ayah = ucfirst(htmlspecialchars($data["pekerjaan_ayah"]));
    $desa_ayah = ucfirst(htmlspecialchars($data["desa_ayah"]));
    $kab_ayah = ucfirst(htmlspecialchars($data["kab_ayah"]));
    $kec_ayah = ucfirst(htmlspecialchars($data["kec_ayah"]));
    $prov_ayah = ucfirst(htmlspecialchars($data["prov_ayah"]));
    $kewar_ayah = ucfirst(htmlspecialchars($data["kewar_ayah"]));
    $kebang_ayah = ucfirst(htmlspecialchars($data["kewar_ayah"]));
    // pelapor
    $nik_lapor = ucfirst(htmlspecialchars($data["nik_lapor"]));
    $nama_lapor = ucfirst(htmlspecialchars($data["nama_lapor"]));
    $umur = ucfirst(htmlspecialchars($data["umur"]));
    $jk_lapor = ucfirst(htmlspecialchars($data["jk_lapor"]));
    $pekerjaan_lapor = ucfirst(htmlspecialchars($data["pekerjaan_lapor"]));
    $desa_lapor = ucfirst(htmlspecialchars($data["desa_lapor"]));
    $kab_lapor = ucfirst(htmlspecialchars($data["kab_lapor"]));
    $kec_lapor = ucfirst(htmlspecialchars($data["kec_lapor"]));
    $prov_lapor = ucfirst(htmlspecialchars($data["prov_lapor"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO kelahiran VALUES ('', '$nama_kk', '$no_kk','$nama_anak','$jk','$tempat_lahir','$hari','$tgl_lahir','$pukul','$jenis_lahir','$ke','$penolong','$berat','$panjang','$nik_ibu','$nama_ibu','$tgl_ibu','$pekerjaan_ibu','$desa_ibu','$kab_ibu','$kec_ibu','$prov_ibu','$kewar_ibu','$kebang_ibu','$tgl_kawin',
    '$nik_ayah','$nama_ayah','$tgl_ayah','$pekerjaan_ayah','$desa_ayah','$kab_ayah','$kec_ayah','$prov_ayah','$kewar_ayah','$kebang_ayah',
    '$nik_lapor','$nama_lapor','$umur','$jk_lapor','$pekerjaan_lapor','$desa_lapor','$kab_lapor','$kec_lapor','$prov_lapor','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariKelahiran($keyword)
{
    $query = "SELECT * FROM Kelahiran WHERE nik_ibu LIKE '$keyword' OR nik_ayah LIKE '$keyword'";

    return query($query);
}

function hapusKelahiran($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM Kelahiran WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKelahiran($keyword)
{
    $query = "SELECT * FROM Kelahiran WHERE nama_anak LIKE '%$keyword%' OR nik_ibu LIKE '%$keyword%' OR nik_ayah LIKE '%$keyword%' OR nama_ayah LIKE '%$keyword%' OR nama_ibu LIKE '%$keyword%' ";

    return query($query);
}

// function untuk menambahkan data kematian
function tambahKematian($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama_lapor = ucfirst(htmlspecialchars($data["nama_lapor"]));
    $nik_lapor = ucfirst(htmlspecialchars($data["nik_lapor"]));
    $umur_lapor = ucfirst(htmlspecialchars($data["umur_lapor"]));
    $pekerjaan_lapor = ucfirst(htmlspecialchars($data["pekerjaan_lapor"]));
    $rt_lapor = ucfirst(htmlspecialchars($data["rt_lapor"]));
    $rw_lapor = ucfirst(htmlspecialchars($data["rw_lapor"]));
    $desa_lapor = strtoupper(htmlspecialchars($data["desa_lapor"]));
    $kec_lapor = ucfirst(htmlspecialchars($data["kec_lapor"]));
    $kab_lapor = ucfirst(htmlspecialchars($data["kab_lapor"]));
    $hub = ucfirst(htmlspecialchars($data["hub"]));
    $nama_mati = ucfirst(htmlspecialchars($data["nama_mati"]));
    $nik_mati = ucfirst(htmlspecialchars($data["nik_mati"]));
    $jk_mati = ucfirst(htmlspecialchars($data["jk_mati"]));
    $tgl_mati = ucfirst(htmlspecialchars($data["tgl_mati"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $rt_mati = ucfirst(htmlspecialchars($data["rt_mati"]));
    $rw_mati = ucfirst(htmlspecialchars($data["rw_mati"]));
    $desa_mati = strtoupper(htmlspecialchars($data["desa_mati"]));
    $kec_mati = ucfirst(htmlspecialchars($data["kec_mati"]));
    $kab_mati = ucfirst(htmlspecialchars($data["kab_mati"]));
    $hari = ucfirst(htmlspecialchars($data["hari"]));
    $tgl_kematian = ucfirst(htmlspecialchars($data["tgl_kematian"]));
    $pukul = ucfirst(htmlspecialchars($data["pukul"]));
    $bertempat = ucfirst(htmlspecialchars($data["bertempat"]));
    $penyebab = ucfirst(htmlspecialchars($data["penyebab"]));
    $bukti = ucfirst(htmlspecialchars($data["bukti"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO mati VALUES ('','$nama_lapor','$nik_lapor','$umur_lapor','$pekerjaan_lapor','$rt_lapor','$rw_lapor','$desa_lapor','$kec_lapor','$kab_lapor',
    '$hub',
    '$nama_mati','$nik_mati','$jk_mati','$tgl_mati','$agama','$rt_mati','$rw_mati','$desa_mati','$kec_mati','$kab_mati',
    '$hari','$tgl_kematian','$pukul','$bertempat','$penyebab','$bukti','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariKematian($keyword)
{
    $query = "SELECT * FROM mati WHERE nik_mati LIKE '$keyword' OR nama_mati LIKE  '%$keyword%' OR nik_lapor LIKE  '$keyword' OR nama_lapor LIKE  '%$keyword%'";

    return query($query);
}

function hapusKematian($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mati WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKematian($keyword)
{
    $query = "SELECT * FROM mati  WHERE nik_mati LIKE '$keyword' OR nama_mati LIKE  '%$keyword%' OR nik_lapor LIKE  '$keyword' OR nama_lapor LIKE  '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data skck
function tambahSkck($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = ucfirst(htmlspecialchars($data["nama"]));
    $jenis_kelamin = ucfirst(htmlspecialchars($data["jenis_kelamin"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $status = ucfirst(htmlspecialchars($data["status"]));
    $nik = ucfirst(htmlspecialchars($data["nik"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $tgl_lahir = ucfirst(htmlspecialchars($data["tgl_lahir"]));
    $pekerjaan = ucfirst(htmlspecialchars($data["pekerjaan"]));
    $rt = ucfirst(htmlspecialchars($data["rt"]));
    $rw = ucfirst(htmlspecialchars($data["rw"]));
    $desa = ucfirst(htmlspecialchars($data["desa"]));
    $kecamatan = ucfirst(htmlspecialchars($data["kecamatan"]));
    $kabupaten = ucfirst(htmlspecialchars($data["kabupaten"]));
    $keperluan = ucfirst(htmlspecialchars($data["keperluan"]));
    $keterangan = ucfirst(htmlspecialchars($data["keterangan"]));

    $mulai = date('Y-m-d');
    $sebulan = mktime(0, 0, 0, date("n"), date("j") + 30, date("Y"));
    $selesai = date("Y-m-d", $sebulan);

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO skck VALUES ('','$nama','$jenis_kelamin','$agama','$status','$nik','$tempat_lahir','$tgl_lahir','$pekerjaan','$rt','$rw','$desa','$kecamatan','$kabupaten','$keperluan','$keterangan','$mulai','$selesai','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariSkck($keyword)
{
    $query = "SELECT * FROM skck WHERE nik LIKE '$keyword'";

    return query($query);
}

function hapusSkck($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM skck WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatSkck($keyword)
{
    $query = "SELECT * FROM skck WHERE nama LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data Usaha
function tambahUsaha($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = ucfirst(htmlspecialchars($data["nama"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $tgl_lahir = ucfirst(htmlspecialchars($data["tgl_lahir"]));
    $nik = ucfirst(htmlspecialchars($data["nik"]));
    $jenis_kelamin = ucfirst(htmlspecialchars($data["jenis_kelamin"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $pekerjaan = ucfirst(htmlspecialchars($data["pekerjaan"]));
    $rt = ucfirst(htmlspecialchars($data["rt"]));
    $rw = ucfirst(htmlspecialchars($data["rw"]));
    $desa = ucfirst(htmlspecialchars($data["desa"]));
    $kecamatan = ucfirst(htmlspecialchars($data["kecamatan"]));
    $kabupaten = ucfirst(htmlspecialchars($data["kabupaten"]));
    $jenis_usaha = ucfirst(htmlspecialchars($data["jenis_usaha"]));
    $nama_usaha = ucfirst(htmlspecialchars($data["nama_usaha"]));
    $keperluan = ucfirst(htmlspecialchars($data["keperluan"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO usaha VALUES ('','$nama','$tempat_lahir','$tgl_lahir','$nik','$jenis_kelamin','$agama','$pekerjaan','$rt','$rw','$desa','$kecamatan','$kabupaten','$jenis_usaha','$nama_usaha','$keperluan','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariUsaha($keyword)
{
    $query = "SELECT * FROM usaha WHERE nik LIKE '$keyword'";

    return query($query);
}

function hapusUsaha($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM usaha WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatUsaha($keyword)
{
    $query = "SELECT * FROM usaha WHERE nama LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data Usaha
function tambahMampu($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = ucfirst(htmlspecialchars($data["nama"]));
    $nik = ucfirst(htmlspecialchars($data["nik"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $tgl_lahir = ucfirst(htmlspecialchars($data["tgl_lahir"]));
    $jenis_kelamin = ucfirst(htmlspecialchars($data["jenis_kelamin"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $status_perkawinan = ucfirst(htmlspecialchars($data["status_perkawinan"]));
    $pekerjaan = ucfirst(htmlspecialchars($data["pekerjaan"]));
    $rt = ucfirst(htmlspecialchars($data["rt"]));
    $rw = ucfirst(htmlspecialchars($data["rw"]));
    $desa = ucfirst(htmlspecialchars($data["desa"]));
    $kecamatan = ucfirst(htmlspecialchars($data["kecamatan"]));
    $kabupaten = ucfirst(htmlspecialchars($data["kabupaten"]));
    $keperluan = ucfirst(htmlspecialchars($data["keperluan"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO mampu VALUES ('','$nama','$nik','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$agama','$status_perkawinan','$pekerjaan','$rt','$rw','$desa','$kecamatan','$kabupaten','$keperluan','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariMampu($keyword)
{
    $query = "SELECT * FROM mampu WHERE nik LIKE '$keyword'";

    return query($query);
}

function hapusMampu($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mampu WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatMampu($keyword)
{
    $query = "SELECT * FROM mampu WHERE nama LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%'";

    return query($query);
}


// function untuk menambahkan data Usaha
function tambahNikah($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = ucfirst(htmlspecialchars($data["nama"]));
    $nik = ucfirst(htmlspecialchars($data["nik"]));
    $tempat_lahir = ucfirst(htmlspecialchars($data["tempat_lahir"]));
    $tgl_lahir = ucfirst(htmlspecialchars($data["tgl_lahir"]));
    $jenis_kelamin = ucfirst(htmlspecialchars($data["jenis_kelamin"]));
    $agama = ucfirst(htmlspecialchars($data["agama"]));
    $kewarganegaraan = ucfirst(htmlspecialchars($data["kewarganegaraan"]));
    $pekerjaan = ucfirst(htmlspecialchars($data["pekerjaan"]));
    $rt = ucfirst(htmlspecialchars($data["rt"]));
    $rw = ucfirst(htmlspecialchars($data["rw"]));
    $desa = ucfirst(htmlspecialchars($data["desa"]));
    $kecamatan = ucfirst(htmlspecialchars($data["kecamatan"]));
    $kabupaten = ucfirst(htmlspecialchars($data["kabupaten"]));
    $keperluan = ucfirst(htmlspecialchars($data["keperluan"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO nikah VALUES ('','$nama','$nik','$tempat_lahir','$tgl_lahir','$jenis_kelamin','$pekerjaan','$agama','$kewarganegaraan','$rt','$rw','$desa','$kecamatan','$kabupaten','$keperluan','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariNikah($keyword)
{
    $query = "SELECT * FROM nikah WHERE nik LIKE '$keyword'";

    return query($query);
}

function hapusNikah($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM Nikah WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatNikah($keyword)
{
    $query = "SELECT * FROM nikah WHERE nama LIKE '%$keyword%' OR nik LIKE '%$keyword%' OR tempat_lahir LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data
function tambahArtikel($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $judul = htmlspecialchars($data["judul"]);
    $isi = $data["isi"];
    $hari_ini = date('Y-m-d');

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // query sql
    $query = "INSERT INTO artikel VALUES ('','$hari_ini','$judul','$isi','$gambar')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

// function untuk upload foto
function upload()
{
    // $_FILES berisi array 2 dimensi [untuk name pada inputan][nama index pada $_FILES biasanya ada 5 (name,error,size,tmp_name,ukuran)]
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar hoe');
        </script>";
        return false;
    }

    // mengecek upload adalah gambar   
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // explode memecah string ke array
    $ekstensiGambar = explode('.', $namaFile);
    // strtolower digunakan untuk mengubah string ke huruf kecil
    // end digunakan untuk mengambil inputan paling belakang
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // mencari jarum pada tumpukan jerami
    // jika benar menghasilkan true dan sebaliknya
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('Ojok ngawur kon, uduk gambar kui');
        </script>";
        return false;
    }

    // mengecek ukuran terlalu besar
    // dalam byte
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuranmu gambar gedi tenan cak');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // untuk memindahkan file dari penyimpanan sementara
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapusArtikel($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM artikel WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatArtikel($keyword)
{
    $query = "SELECT * FROM artikel WHERE judul LIKE '%$keyword%'";

    return query($query);
}


// function untuk menambahkan data Usaha
function tambahKk($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama_kepala = strtoupper(htmlspecialchars($data["nama_kepala"]));
    $nik = strtoupper(htmlspecialchars($data["nik"]));
    $alamat = strtoupper(htmlspecialchars($data["alamat"]));
    $rt = strtoupper(htmlspecialchars($data["rt"]));
    $rw = strtoupper(htmlspecialchars($data["rw"]));
    $desa = strtoupper(htmlspecialchars($data["desa"]));
    $kecamatan = strtoupper(htmlspecialchars($data["kecamatan"]));
    $kabupaten = strtoupper(htmlspecialchars($data["kabupaten"]));
    $prov = strtoupper(htmlspecialchars($data["prov"]));
    $kode_pos = strtoupper(htmlspecialchars($data["kode_pos"]));
    $telepon = strtoupper(htmlspecialchars($data["telepon"]));
    $jumlah = strtoupper(htmlspecialchars($data["jumlah"]));

    $hari_ini = date('Y-m-d');
    $satu_hari = mktime(0, 0, 0, date("n"), date("j") + 1, date("Y"));
    if (date('N') == 6) {
        $dua_hari        = mktime(0, 0, 0, date("n"), date("j") + 2, date("Y"));
        $pengambilan        = date("Y-m-d", $dua_hari);
    } else if (date('N') == 7) {
        $pengambilan        = date("Y-m-d", $satu_hari);
    } else if (date('N') == 5) {
        $tiga_hari        = mktime(0, 0, 0, date("n"), date("j") + 3, date("Y"));
        $pengambilan        = date("Y-m-d", $tiga_hari);
    } else {
        $pengambilan        = date("Y-m-d", $satu_hari);
    }
    // query sql
    $query = "INSERT INTO kk VALUES ('','$nama_kepala','$nik','$alamat','$rt','$rw','$desa','$kecamatan','$kabupaten','$prov','$kode_pos','$telepon','$jumlah','$hari_ini','$pengambilan')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function cariKk($keyword)
{
    $query = "SELECT * FROM kk WHERE nik LIKE '$keyword'";

    return query($query);
}

function hapusKk($id)
{
    global $conn;
    mysqli_query($conn, "DELETE kk.*, anggota.* FROM kk INNER JOIN anggota ON kk.nik=anggota.nik WHERE kk.id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKk($keyword)
{
    $query = "SELECT * FROM kk WHERE nama_kepala LIKE '%$keyword%' OR nik LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data Usaha
function tambahData($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = strtoupper(htmlspecialchars($data["nama"]));
    $nik = strtoupper(htmlspecialchars($data["nik"]));
    $nik_anggota = strtoupper(htmlspecialchars($data["nik_anggota"]));
    $jenis_kelamin = strtoupper(htmlspecialchars($data["jenis_kelamin"]));
    $tempat_lahir = strtoupper(htmlspecialchars($data["tempat_lahir"]));
    $tanggal_lahir = strtoupper(htmlspecialchars($data["tanggal_lahir"]));
    $agama = strtoupper(htmlspecialchars($data["agama"]));
    $pendidikan = strtoupper(htmlspecialchars($data["pendidikan"]));
    $pekerjaan = strtoupper(htmlspecialchars($data["pekerjaan"]));
    $status_perkawinan = strtoupper(htmlspecialchars($data["status_perkawinan"]));
    $status_hubungan = strtoupper(htmlspecialchars($data["status_hubungan"]));
    $kewarganegaraan = strtoupper(htmlspecialchars($data["kewarganegaraan"]));
    $no_paspor = strtoupper(htmlspecialchars($data["no_paspor"]));
    $no_kitas = strtoupper(htmlspecialchars($data["no_kitas"]));
    $ayah = strtoupper(htmlspecialchars($data["ayah"]));
    $ibu = strtoupper(htmlspecialchars($data["ibu"]));

    // query sql
    $query = "INSERT INTO anggota VALUES ('','$nik','$nama','$nik_anggota','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$agama','$pendidikan','$pekerjaan','$status_perkawinan','$status_hubungan','$kewarganegaraan','$no_paspor','$no_kitas','$ayah','$ibu')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

// function untuk menambahkan data kegiatan
function tambahKegiatan($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $judul = htmlspecialchars($data["judul"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $isi = $data["isi"];

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // query sql
    $query = "INSERT INTO kegiatan VALUES ('','$judul','$isi','$gambar','$tanggal','$tempat')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function hapusKegiatan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kegiatan WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKegiatan($keyword)
{
    $query = "SELECT * FROM kegiatan WHERE judul LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data pengurus
function tambahPengurus($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $offering = htmlspecialchars($data["offering"]);
    $angkatan = htmlspecialchars($data["angkatan"]);
    $jabatan = htmlspecialchars($data["jabatan"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // query sql
    $query = "INSERT INTO pengurus VALUES ('','$nama','$prodi','$offering','$angkatan','$jabatan','$gambar')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function hapusPengurus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pengurus WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatPengurus($keyword)
{
    $query = "SELECT * FROM pengurus WHERE nama LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data info
function tambahInfo($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $judul = htmlspecialchars($data["judul"]);
    $isi = $data["isi"];
    // query sql
    $query = "INSERT INTO info VALUES ('','$judul','$isi')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function hapusInfo($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM info WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatInfo($keyword)
{
    $query = "SELECT * FROM info WHERE judul LIKE '%$keyword%'";

    return query($query);
}


// function untuk menambahkan data info
function tambahKritik($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = htmlspecialchars($data["nama"]);
    $isi = htmlspecialchars($data["isi"]);
    $hari_ini = date('Y-m-d');
    // query sql
    $query = "INSERT INTO kritik VALUES ('','$nama','$isi','$hari_ini')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function hapusKritik($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kritik WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatKritik($keyword)
{
    $query = "SELECT * FROM kritik WHERE nama LIKE '%$keyword%'";

    return query($query);
}

// function untuk menambahkan data Wisata
function tambahWisata($data)
{
    global $conn;
    // htmlspecialchars digunakan untuk mengubah inputan menjadi string
    $nama = htmlspecialchars($data["nama"]);
    $link = htmlspecialchars($data["link"]);

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    // query sql
    $query = "INSERT INTO wisata VALUES ('','$nama','$link','$gambar')";
    mysqli_query($conn, $query);
    // mengembalikan nilai perubahan data (1 = berhasil) (-1 = gagal)
    return mysqli_affected_rows($conn);
}

function hapusWisata($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM wisata WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function cariPembuatWisata($keyword)
{
    $query = "SELECT * FROM wisata WHERE nama LIKE '%$keyword%'";

    return query($query);
}
