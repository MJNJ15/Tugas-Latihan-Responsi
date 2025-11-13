<?php 

include "function.php";

if(isset($_POST["login"])) {
    login($_POST);
}

if(isset($_GET["pesan"])) {
    if($_GET["pesan"] === "gagal") {
        $pesan = "Gagal Login";
    }else if($_GET["pesan"] === "belum") {
        $pesan = "Belum Login";
    }else if($_GET["pesan"] === "logout") {
        $pesan = "Berhasil Logout";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            align-items: center;
        }

        .inputan {
            margin-left: 150px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col col-6">
                <img src="img/film.jpg" alt="" style="height: 700px;">
            </div>
            <div class="col inputan">
                <h2><?php if(isset($pesan)) echo $pesan; ?></h2>
                <h2>LOGIN</h2>
                <p>Masukkan username dan password</p> 
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-success m-2">Login</button>
                </form>
                <p>Belum punya akun? <a href="index.php">Daftar di sini</a><br>Default admin/admin</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>