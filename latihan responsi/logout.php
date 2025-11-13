<?php 

include "function.php";

session_unset();

header("location: login.php?pesan=logout");

?>