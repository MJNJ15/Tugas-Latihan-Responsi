<?php 

include "function.php";

if(isset($_SESSION["username"])) {
    $nama = $_SESSION["username"];
}else {
    header("location: login.php?pesan=belum");
}

$query = "SELECT * FROM film";
$hasil = mysqli_query($koneksidb, $query);
$totalharga = 0;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .header {
            background-color: rgb(61, 61, 119);
            color: white;
            padding: 15px 0;
        }
    </style>
</head>
  <body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1>Manajemen Film Bioskop</h1>
                    <span>Selamat datang, <?php if(isset($nama)) echo $nama; ?> | <a href="logout.php">logout</a></span>
                </div>
            </div>
        </div>
    </div>

    <div class="container ms-4 mt-4">
        <div class="row mt-2">
            <a href="tambahfilm.php"><button type="button" class="btn btn-success">Tambah Film</button></a>
        </div>
        <div class="row mt-2">
            <table class="table table-bordered table-striped">
            
                <tr>
            
                    <th style="background-color: rgb(61, 61, 119); color:white">ID</th>
                    <th style="background-color: rgb(61, 61, 119); color:white">Judul Film</th>
                    <th style="background-color: rgb(61, 61, 119); color:white">Sutradara</th>
                    <th style="background-color: rgb(61, 61, 119); color:white">Harga Tiket</th>
                    <th style="background-color: rgb(61, 61, 119); color:white">Aksi</th>
                </tr>

                <?php while($data = mysqli_fetch_assoc($hasil)) { 
                $totalharga = $totalharga + $data["harga_tiket"];
                ?>
                
                <tr>
                    <td><?= $data["id_film"]; ?></td>
                    <td><?= $data["judul_film"]; ?></td>
                    <td><?= $data["sutradara"]; ?></td>
                    <td>Rp <?= number_format($data["harga_tiket"], 0, ",", "."); ?></td>
                    <td><a href="editfilm.php?id=<?= $data["id_film"]; ?>">Edit</a> | <a href="hapusfilm.php?id=<?= $data["id_film"]; ?>" style="color: red;" onclick="return confirm('Apakah anda yakin ingin mengahpus film ini?')">Hapus</a></td>
                </tr>

                <?php } ?>

                <tr>
                    <td style="background-color: aliceblue;" colspan="3">Total Haga Tiket</td>
                    <td style="background-color: aliceblue;" colspan="2">Rp <?= number_format($totalharga, 0, ",", "."); ?></td>
                </tr>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>