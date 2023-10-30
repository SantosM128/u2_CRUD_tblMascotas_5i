<?php
include("./config.php");

if (isset($_POST['eliminardatos'])) {
    // tomar el id
    $id = $_POST['eliminar_id'];

    //eliminar consulta
    $sql = "DELETE FROM tbl_mascotas WHERE id_Masc = '$id'";
    $query = mysqli_query($db, $sql);

    // ¿Se elimina correctamente la consulta?
    if ($query) {
        header('Location: ./index.php?eliminar=Exitoso');
    } else
        die('Location: ./index.php?eliminar=Error');
} else
    die("Acceso prohibido....");
