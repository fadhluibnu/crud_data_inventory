<?php
session_start();
if (empty($_SESSION['username'])){
    header('location:index.php');	
}

include "config/koneksi.php";

$edit = mysqli_query($koneksi, "SELECT * FROM barang WHERE idBarang='$_GET[id]'");
$data = mysqli_fetch_array($edit);
?>

<html>
<head>
    <title>Form Edit Barang</title>
</head>
<body>
    <center>
        <h2 align="center">Edit Barang</h2>
        <?php
        echo "<h5>Login Sebagai : ".$_SESSION['username']."</h5>"; 
        ?>
        <div class="glass">
            <form action="update_barang.php" method="post" name="update" enctype="multipart/form-data">
                <?php
                echo "<input type='hidden' name='idBarang' value='$data[idBarang]'>
                <table align='center' border='0' id='table1'>
                <tr>
                    <td>Nama Barang</td>
                    <td> : </td>
                    <td><input type='text' name='namaBarang' value='$data[namaBarang]'></td>
                <tr>
                <tr>
                    <td>Kategori</td>
                    <td> : </td>";
                $tampil = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");
                while($c = mysqli_fetch_array($tampil)){
                    if ($row['id_kategori'] == $c['id_kategori']){
                        echo "option value='$c[id_kategori]' selected>$c[nama_kategori]</option>";
                    }else{
                        echo "<option value='$c[id_kategori]'>$c[nama_kategori]</option>";
                    }
                
                }
                echo "</select></td>
                </tr>
                <tr>
                    <td>Jumlah</td>
                    <td> <input type='text' name='jumlah' value='$row[jumlah]' size='15'></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Brand</td>
                    <td> <input type='text' name='brand' value='$row[brand]' size='15'></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Harga</td>
                    <td> <input type='text' name='harga' value='$row[harga]' size='15'></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Gamabar</td>
                    <td>
                    <img src='gambar/$row[gambar]' width='200px' height='200px'>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>Ganti Gambar</td>
                    <td> : <input type='file' name='fupload' size='40'></td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td colspan='3' align='center'>
                    #Jika tidak ingin menngubah gambar, silahkan abaikan saja 
                    </td>
                </tr>
                <tr>
                    <td colspan='3'>
                    <input id='update' type='submit' name='submit' value='Perbarui'>
                    </td>
                </tr>
                </table>";
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
    </center>
</body>
</html>
