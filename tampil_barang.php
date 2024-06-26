<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:index.php");
}

require 'config/koneksi.php';
$barang = query("SELECT * FROM barang");

if (isset($_POST['cari'])) {
    $barang = cari($_POST['keyword']);
}
?>

<html>
    <head>
        <title>Inventory Gudang</title>
        <link rel="stylesheet" href="assets/css/tbarang.css">

        <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    </head>
    <body>
        <h2 align="center">DAFTAR BARANG</h2>
        <center>
            <table>
                <form action="form_barang.php" method="post">
                    <button>Tambah Barang</button>
                </form>
                <form action="menu.php" method="post">
                    <button>Menu Utama</button>
                </form>
                <form action="logout.php" method="post">
                    <button>Logout</button>
                </form>
            </table>
            <br>
            <form action="" method="post">
                <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off" id="keyword">
            </form>
            <div id="container">
                <table class="styled-table" border="0">
                    <tr class="judul">
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Brand</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $row) { ?>
                        <tr class="isi">
                            <td align="center"><?= $i; ?></td>
                            <td align="left"><?= $row['namaBrg']; ?></td>
                            <td align="left"><?= $row['brand']; ?></td>
                            <td align="left"><?= $row['kategori']; ?></td>
                            <td align="left"><?= $row['jumlah']; ?></td>
                            <td align="left">Rp. <?= $row['harga']; ?></td>
                            <td align="center">
                                <img src="gambar/<?= $row['gambar']; ?>" width="70" height="70">
                            </td>
                            <td align="center">
                                <a style="text-decoration: none;" href="./edit_barang.php?id=<?php echo $row['idBarang']; ?>">Edit</a>
                            </td>
                            <br><br>
                            <a href="hapus_barang.php?id=<?php echo $row['idbarang']; ?>" style="text-decoration: none;" onclick="return confirm('yakin ingin menghapus data ini ?')">Hapus</a>
                        </tr>
                    <?php $i++; } ?>
                </table>
            </div>
        </center>
        <script src="assets/js/cari.js"></script>
    </body>
</html>
