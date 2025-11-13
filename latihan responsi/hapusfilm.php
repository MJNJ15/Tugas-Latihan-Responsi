<?php 

include "function.php";

if(!isset($_SESSION["username"])) {
    header("location: login.php?pesan=belum");
}

$id = $_GET["id"];
$query = "DELETE FROM film WHERE id_film = $id";
mysqli_query($koneksidb, $query);
header("location: home.php");

?>