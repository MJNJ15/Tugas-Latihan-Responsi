<?php 

include "function.php";

if(!isset($_SESSION["username"])) {
    header("location: login.php?pesan=belum");
}

$id = $_GET["id"];

if(isset($_POST["edit"])) {
    editfilm($_POST);
    header("location: home.php");
}

$query = "SELECT * FROM film WHERE id_film = $id";
$hasil = mysqli_query($koneksidb, $query);
$data = mysqli_fetch_assoc($hasil);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
  <body>
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="page-name">Edit Film</h1>
                    <span>Perbarui informasi film</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container ms-4 mt-4">
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <input type="text" class="form-control" required value="<?= $data["id_film"] ?>" disabled>
                <input type="hidden" name="id" class="form-control" required value="<?= $data["id_film"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Judul Film</label>
                <input type="text" name="judul" class="form-control" required value="<?= $data["judul_film"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Sutradara</label>
                <input type="text" name="sutradara" class="form-control" required value="<?= $data["sutradara"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Tiket (Rp)</label>
                <input type="number" name="harga" class="form-control" required value="<?= $data["harga_tiket"] ?>">
            </div>
            <button type="submit" name="edit" class="btn btn-success">Perbarui</button> <a href="home.php"><button type="button" class="btn btn-secondary">Kembali</button></a>
            
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>