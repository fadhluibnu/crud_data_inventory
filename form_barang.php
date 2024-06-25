<?php

session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}

?>

<html>
    <head>
        <title>:: Barang ::</title>
        <link rel="stylesheet" href="assets/css/fbarang.css">
    </head>
    <body bgcolor="#fff">
        <center>
            <h2 align="center">INPUT DATA BARANG</h2>
            <?php
            echo "<h5>Login Sebagai :";
            echo $_SESSION['username']; 
            ?>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_7k8jk8vi.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
        </center>
        <center>
            <div class="glass">
                <form action="input_barang.php" enctype="multipart/form-data" method="post">
                    <table>
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
                                    include 'config/koneksi.php';
                                    $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                                    while ($r = mysqli_fetch_array($tampil)) {
                                        echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
                                    }
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
                    </table>
                </form>
                <br>
                <table>
                    <form action="menu.php" method="post">
                        <button>Menu Utama</button>
                    </form>
                    <form action="tampil_barang.php" method="post">
                        <button>Tampil Barang</button>
                    </form>
                </table>
            </div>
        </center>
    </body>
</html>