<?php
session_start();
if (!empty($_SESSION['username'])) {
    header("location:menu.php");
}
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo '<script type="text/javascript">';
        echo 'alert("Silahkan Masukkan Username dan Password dengan benar")';
        echo '</script>';
    }
}

?>

<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="assets/css/styles.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <title>Login</title>
</head>

<body class="body-login">
    <div class="login__col-2">
        <lottie-player src="./assets/lottie/Animation - 1719206264737.json" background="transparent" speed="1" class="login__lottie-player" direction="1" mode="normal" loop autoplay></lottie-player>
    </div>
    <div class="login__col-1">
        <h1 class="title">INVENTORY</h1>
        <p>Masuk Akun</p>
        <h1 class="welcome">WELCOME TO <br>INVENTORY</h1>
        <form action="login_proses.php" method="post" name="login" id="login">
            <div class="login__input">
            <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="login__input">
            <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" name="login">Continue</button>
        </form>
    </div>
    <!-- <div class="l-form">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="form">
            <lottie-player class="form__img" src="https://assets5.lottiefiles.com/packages/lf20_mrmg8x7w.json" background="transparent" speed="1" style="width: 500px;height:500px" loop autoplay>
            </lottie-player>

            <form action="login_proses.php" id="login" method="post" name="login">
                <h1 class="form__title">Welcome</h1>

                <div class="form__div form__div-one">
                    <div class="form__icon">
                        <div class="bx bx-user-circle"></div>
                    </div>

                    <div class="form__div-input">
                        <label for="" class="form__label">Username</label>
                        <input type="text" class="form__input" name="username" id="username">
                    </div>
                </div>

                <div class="form__div">
                    <div class="form__icon">
                        <i class="bx bx-lock"></i>
                    </div>
                    <div class="form__div-input">
                        <label for="" class="form__label">Password</label>
                        <input type="password" class="form__input" name="password" id="password">
                    </div>
                </div>
                <br><br>
                <input type="submit" name="login" class="form__button" id="login" value="Login">
            </form>
        </div>
    </div> -->
    <script src="assets/js/main.js"></script>
</body>

</html>