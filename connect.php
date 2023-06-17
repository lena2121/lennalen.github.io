<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "alena_airline";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if(!$conn) {
        die("koneksi gagal:". mysqli_connect_error());
    }

?>

