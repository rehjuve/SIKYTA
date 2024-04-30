<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "db_sikyta";
$conn = mysqli_connect($host, $user, $pass, $db) or die("Koneksi gagal!". mysqli_connect_error());