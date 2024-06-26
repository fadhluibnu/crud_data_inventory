<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:index.php');
}

include "config/koneksi.php";

$edit = mysqli_query($konek, "SELECT * FROM barang WHERE idBarang='$_GET[id]'");
$row = mysqli_fetch_array($edit);
?>

<html>

<head>
    <title>Form Edit Barang</title>
    <link rel="stylesheet" href="./assets/css/ebarang.css">
</head>

<body class="body-form">
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
        <h1 class="welcome">EDIT DATA BARANG</h1>
        <div class="glass">
            <form action="update_barang.php" enctype="multipart/form-data" method="post">
                <input type='hidden' name='id' value='<?= $row['idBarang'] ?>'>
                <div class="form__input">
                    <label for="barang">Nama Barang</label>
                    <input type="text" name="barang" id="barang" placeholder="barang" value='<?= $row['namaBrg'] ?>'>
                </div>
                <div class="form__input">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="brand" placeholder="brand" value='<?= $row['brand'] ?>'>
                </div>
                <div class="form__input">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori">
                        <option value="0" selected>- Pilih Kategori -</option>
                        <?php
                        $tampil = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori");
                        while ($r = mysqli_fetch_array($tampil)) {
                            if ($row['kategori'] == $r['id_kategori']) {
                                echo "<option value=$r[id_kategori] selected>$r[nama_kategori]</option>";
                            } else {
                            echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form__input">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" name="jumlah" id="jumlah" placeholder="jumlah" value='<?= $row['jumlah'] ?>'>
                </div>
                <div class="form__input">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" placeholder="harga" value='<?= $row['harga'] ?>'>
                </div>
                <div class="form__input">
                    <label for="fupload">Ganti Gambar</label>
                    <img src='gambar/<?= $row['gambar'] ?>' width='200px' height='200px'>
                    <input type="file" name="fupload" id="fupload" placeholder="fupload">
                    <span>#Jika tidak ingin menngubah gambar, silahkan abaikan saja </span>
                </div>
                <button id='update' type="submit" name="submit">Perbarui</button>
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
    <!-- <div>
        <?php
        // echo "<p>Login Sebagai : " . $_SESSION['username'] . "</p>";
        ?>
        <h1 class="welcome">Edit Barang</h1>
        <div class="glass">
            <form action="update_barang.php" method="post" name="update" enctype="multipart/form-data">
                <?php
                // echo "<input type='hidden' name='idBarang' value='$data[idBarang]'>
                // <table align='center' border='0' id='table1'>
                // <tr>
                //     <td>Nama Barang</td>
                //     <td> : </td>
                //     <td><input type='text' name='namaBarang' value='$data[namaBarang]'></td>
                // <tr>
                // <tr>
                //     <td>Kategori</td>
                //     <td> : </td>";
                // $tampil = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");
                // while($c = mysqli_fetch_array($tampil)){
                //     if ($row['id_kategori'] == $c['id_kategori']){
                //         echo "option value='$c[id_kategori]' selected>$c[nama_kategori]</option>";
                //     }else{
                //         echo "<option value='$c[id_kategori]'>$c[nama_kategori]</option>";
                //     }

                // }
                // echo "</select></td>
                // </tr>
                // <tr>
                //     <td>Jumlah</td>
                //     <td> <input type='text' name='jumlah' value='$row[jumlah]' size='15'></td>
                // </tr>
                // <tr><td></td></tr>
                // <tr>
                //     <td>Brand</td>
                //     <td> <input type='text' name='brand' value='$row[brand]' size='15'></td>
                // </tr>
                // <tr><td></td></tr>
                // <tr>
                //     <td>Harga</td>
                //     <td> <input type='text' name='harga' value='$row[harga]' size='15'></td>
                // </tr>
                // <tr><td></td></tr>
                // <tr>
                //     <td>Gamabar</td>
                //     <td>
                //     <img src='gambar/$row[gambar]' width='200px' height='200px'>
                //     </td>
                // </tr>
                // <tr><td></td></tr>
                // <tr>
                //     <td>Ganti Gambar</td>
                //     <td> : <input type='file' name='fupload' size='40'></td>
                // </tr>
                // <tr><td></td></tr>
                // <tr>
                //     <td colspan='3' align='center'>
                //     #Jika tidak ingin menngubah gambar, silahkan abaikan saja 
                //     </td>
                // </tr>
                // <tr>
                //     <td colspan='3'>
                //     <input id='update' type='submit' name='submit' value='Perbarui'>
                //     </td>
                // </tr>
                // </table>";
                ?>
                <br><br>
                <table>
                    <form action="menu.php" method="post">
                        <button>Menu Utama</button>
                    </form>
                    <form action="tampil_barang.php" method="post">
                        <button>Tampil Barang</button>
                    </form>
                </table>
            </form>
        </div>
    </div> -->
</body>

</html>