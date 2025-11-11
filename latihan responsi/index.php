<?php

include "function.php";

if(isset($_POST["register"]))
    if(register($_POST) == 1) {
        header("location: index.php");
    }else {
        header("location: login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <h2>Register</h2>
                <p>Isi semua data dengan benar</p> 
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password1" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-success m-2">Register</button>
                </form>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a><br>Default admin/admin</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>