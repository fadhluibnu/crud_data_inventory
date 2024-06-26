<link rel="stylesheet" href="assets/css/ibarang.css">
<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}

include 'config/koneksi.php';
?>

<html>
    <head>
        <title>:: Menu Utama ::</title>
        <link rel="stylesheet" href="assets/css/ibarang.css">
    </head>
    <body>
        <center>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qlwqp9xi.json" background="transparent" speed="1" style="width: 420px; height: 420px;" loop autoplay></lottie-player>
        </center>
        <?php
        $lokasi_file = $_FILES['fupload']['tmp_name'];
        $nama_file = $_FILES['fupload']['name'];    

        if (!empty($lokasi_file)) {
            move_uploaded_file($lokasi_file, "gambar/$nama_file");
            $a = mysqli_query($konek, "INSERT INTO barang (namabrg, brand, kategori, jumlah, harga, gambar) VALUES ('$_POST[barang]', '$_POST[brand]', '$_POST[kategori]', '$_POST[jumlah]', '$_POST[harga]', '$nama_file')");
        ?>
        <script>
            alert("Data Berhasil Disimpan");
            window.location = "form_barang.php";
        </script>
        <?php
        } else {
        ?>
        <h1 align="center">
            Maaf, Data yang anda masukkan tidak lengkap, <br> Silahkan Kembali.
        </h1>
        <br>
        <br>
        <center>
            <table>
                <form action="form_barang.php" method="post">
                    <button>Kembali</button>
                </form>
                <form action="logout.php" method="post">
                    <button>Logout</button>
                </form>
            </table>
        </center>
        <?php
        }
        ?>
    </body>
</html>