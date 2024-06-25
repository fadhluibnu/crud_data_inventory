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
    <title>:: Menu Utama ::</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</head>

<body class="body-menu">
    <div class="menu__col-2">
        <!-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-palyer.js"></script>
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_1pxqjqps.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player>
        <lottie-player src="./assets/lottie/Animation - 1719206264737.json" background="transparent" speed="1" class="menu__lottie-player" direction="1" mode="normal" loop autoplay></lottie-player> -->
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://lottie.host/ac728f68-cad4-4fed-8875-0422a6a3d637/uPfUoDjHxe.json" background="transparent" speed="1" direction="1" mode="normal" loop autoplay class="lottie-up-mobile"></lottie-player>
    </div>
    <div class="menu__col-1">
        <h1 class="title">INVENTORY</h1>
        <div class="lottie-mobile">
            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/ac728f68-cad4-4fed-8875-0422a6a3d637/uPfUoDjHxe.json" background="transparent" speed="1" direction="1" mode="normal" loop autoplay></lottie-player>
        </div>
        <p>Berhasil Masuk</p>
        <h1 class="welcome">MENU UTAMA</h1>
        <form action="form_barang.php" method="post">
            <button>Tambah Barang</button>
        </form>

        <form action="tampil_barang.php" method="post">
            <button>Tampil Barang</button>
        </form>

        <form action="logout.php" method="post">
            <button>Logout</button>
        </form>
        <!-- <center>
            <p align="center">
                <font size="12">
                    <b>Menu Utama</b>
                </font>
            </p>

            <form action="form_barang.php" method="post">
                <button>Tambah Barang</button>
            </form>

            <form action="tampil_barang.php" method="post">
                <button>Tampil Barang</button>
            </form>

            <form action="logout.php" method="post">
                <button>Logout</button>
            </form>
        </center> -->
    </div>
</body>

</html>