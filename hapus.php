<?php
require 'functions.php';

$id = $_GET["id"];
$ket = $_GET["hapus"];
if ("lahir" == $ket) {
    if (hapusKelahiran($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("ktp" == $ket) {
    if (hapusKtp($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("mati" == $ket) {
    if (hapusKematian($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("skck" == $ket) {
    if (hapusSkck($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("usaha" == $ket) {
    if (hapusUsaha($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("mampu" == $ket) {
    if (hapusMampu($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("nikah" == $ket) {
    if (hapusNikah($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("artikel1" == $ket) {
    if (hapusArtikel($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("kk" == $ket) {
    if (hapusKk($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("kegiatan1" == $ket) {
    if (hapusKegiatan($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("pengurus1" == $ket) {
    if (hapusPengurus($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("info1" == $ket) {
    if (hapusInfo($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("kritik" == $ket) {
    if (hapusKritik($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} elseif ("wisata1" == $ket) {
    if (hapusWisata($id) > 0) {
        echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
    }
} else {
    echo "
        <script>
            document.location.href = 'javascript:window.history.go(-1);';
        </script>
    ";
}
