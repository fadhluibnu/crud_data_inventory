<?php

session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:: Barang ::</title>
    <link rel="stylesheet" href="assets/css/fbarang.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body bgcolor="#fff" class="body-form">
    <div class="form__col-2">
        <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> -->
        <!-- https://assets5.lottiefiles.com/packages/lf20_7k8jk8vi.json -->
        <!-- <lottie-player src="./assets/lottie/lf20_7k8jk8vi.json" background="transparent" class="lottie-up-mobile" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player> -->

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://lottie.host/bb741d81-2fcf-453f-a6e6-ba573179fd40/ZwQHhDNaRa.json" background="transparent" class="lottie-up-mobile" speed="1" direction="1" mode="normal" loop autoplay></lottie-player>
    </div>
    <div class="form__col-1">
        <h1 class="title">INVENTORY</h1>
        <div class="lottie-mobile">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/bb741d81-2fcf-453f-a6e6-ba573179fd40/ZwQHhDNaRa.json" background="transparent" speed="1" direction="1" mode="normal" loop autoplay></lottie-player>
        </div>
        <?php
        echo "<p>Login Sebagai : ";
        echo $_SESSION['username'];
        echo "</p>";
        ?>
        <h1 class="welcome">INPUT DATA BARANG</h1>
        <div class="glass">
            <form action="input_barang.php" enctype="multipart/form-data" method="post">
                <div class="form__input">
                    <label for="barang">Nama Barang</label>
                    <input type="text" name="barang" id="barang" placeholder="barang">
                </div>
                <div class="form__input">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="brand" placeholder="brand">
                </div>
                <div class="form__input">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori">
                        <option value="0" selected>- Pilih Kategori -</option>
                        <?php
                        include 'config/koneksi.php';
                        $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                        while ($r = mysqli_fetch_array($tampil)) {
                            echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form__input">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" id="jumlah" placeholder="jumlah">
                </div>
                <div class="form__input">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" placeholder="harga">
                </div>
                <div class="form__input">
                    <label for="fupload">Gambar</label>
                    <input type="file" name="fupload" id="fupload" placeholder="fupload">
                </div>
                <button type="submit" name="submit">Simpan</button>
                <!-- <table>
                    <tr>
                        <td valign="top">Nama Barang</td>
                        <td> : <input type="text" name="barang" size="30"></td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td> : <input type="text" name="brand" size="15"></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            :
                            <select name="kategori" id="">
                                <option value="0" selected>- Pilih Kategori -</option>
                                <?php
                                // include 'config/koneksi.php';
                                // $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                                // while ($r = mysqli_fetch_array($tampil)) {
                                //     echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
                                // }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>: <input type="text" name="jumlah" size="15"></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>: <input type="text" name="harga" size="15"></td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>: <input type="file" name="fupload" size="40"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input id="submit" type="submit" name="submit" value="Simpan">
                        </td>
                    </tr>
                </table> -->
            </form>
            <br>
            <div style="display: flex; gap:5px; justify-content: space-between;">
                <form action="menu.php" method="post" style="width: 100%;">
                    <button>Menu Utama</button>
                </form>
                <form action="tampil_barang.php" method="post" style="width: 100%;">
                    <button>Tampil Barang</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>