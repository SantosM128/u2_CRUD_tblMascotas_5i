<?php
include("./config.php");

// Compruebe si se ha hecho clic en el botón de agregar o no
if (isset($_POST['agregar'])) {
    // recuperar datos del formulario
    
    $Nombre = $_POST['Nombre'];
    $Raza = $_POST['Raza'];
    $Especie = $_POST['Especie'];
    $Genero = $_POST['Genero'];
    $id_Cli = $_POST['id_Cli'];
    $FechaN = $_POST['FechaN'];
    $id_HistorialM = $_POST['id_HistorialM'];

    // query
    $sql = "INSERT INTO tbl_mascotas( Nombre, Raza, Especie, Genero, id_Cli,FechaN,id_HistorialM)
    VALUES('$Nombre', '$Raza', '$Especie', '$Genero', '$id_Cli', '$FechaN', '$id_HistorialM')";
    $query = mysqli_query($db, $sql);

    // Comprueba si la consulta se guardó correctamente
    if ($query)
        header('Location: ./index.php?Genero=Exitoso');
    else
        header('Location: ./index.php?Genero=Error');
} else
    die("Acceso prohibido....");
