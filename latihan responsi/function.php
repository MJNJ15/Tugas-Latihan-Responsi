<?php 

session_start();

$koneksidb = new mysqli("localhost", "root", "", "bioskop");

function tambahfilm($data) {
    global $koneksidb;

    $judul = $data["judul"];
    $sutradara = $data["sutradara"];
    $harga = $data["harga"];

    $query = "INSERT INTO film (judul_film, sutradara, harga_tiket) VALUES ('$judul', '$sutradara', '$harga')";
    mysqli_query($koneksidb, $query);
    header("location: home.php");
}

function editfilm($data) {
    global $koneksidb;

    $id = $data["id"];
    $judul = $data["judul"];
    $sutradara = $data["sutradara"];
    $harga = $data["harga"];

    $query = "UPDATE film SET judul_film = '$judul', sutradara = '$sutradara', harga_tiket = '$harga' WHERE id_film = $id";
    mysqli_query($koneksidb, $query);
    header("location: home.php");
}

function login($data) {
    global $koneksidb;

    $username = $data["username"];
    $password = $data["password"];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $hasil = mysqli_query($koneksidb, $query);

    if(mysqli_num_rows($hasil) > 0) {
        $_SESSION["username"] = $username;
        header("location: home.php");
    }else {
        header("location: login.php?pesan=gagal");
    }
}

function register($data) {
    global $koneksidb;

    $nama = $data["nama"];
    $username = $data["username"];
    $password1 = $data["password1"];
    $password2 = $data["password2"];

    if($password1 === $password2) {
        $query = "INSERT INTO users (username, password, nama_lengkap) VALUES ('$username', '$password1', '$nama')";
        mysqli_query($koneksidb, $query);
        return 0;
    }else {
        return 1;
    }

}

?>