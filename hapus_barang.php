<?php

session_start();
if (empty($_SESSION['username'])){
    header('location:index.php');	
}

include "config/koneksi.php";

$id = $_GET['id'];

if (hapus($id) > 0){ ?>
    <script>
        alert('Data berhasil dihapus');
        document.location.href = 'tampil_barang.php';
    </script>

<?php
}
else{ ?>
    <script>
        alert('Data gagal dihapus');
        document.location.href = 'tampil_barang.php';
    </script>
<?php
}

?>