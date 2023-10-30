<?php
include("./config.php");

        
// ¿ya se ha hecho clic en el botón de registro?
if (isset($_POST['editar_datos'])) {
    // recuperar datos del formulario
   
    $editar_id_Masc = $_POST['editar_id_Masc'];
    $editar_Nombre = $_POST['editar_Nombre'];
    $editar_Raza = $_POST['editar_Raza'];
    $editar_Especie = $_POST['editar_Especie'];
    $editar_Genero = $_POST['editar_Genero'];
    $editar_id_Cli = $_POST['editar_id_Cli'];
    $editar_FechaN= $_POST['editar_FechaN'];
    $editar_id_HistorialM = $_POST['editar_id_HistorialM'];

    // query
    $sql = "UPDATE tbl_mascotas SET Nombre='$editar_Nombre', Raza='$editar_Raza', Especie='$editar_Especie', Genero='$editar_Genero', id_Cli='$editar_id_Cli', FechaN='$editar_FechaN', id_HistorialM='$editar_id_HistorialM' WHERE id_Masc = '$editar_id_Masc'";
    $query = mysqli_query($db, $sql);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
