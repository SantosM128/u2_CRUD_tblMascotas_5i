<?php

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "bd_veterinaria";

$db = mysqli_connect($server, $user, $password, $nama_database);

if (!$db)
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
