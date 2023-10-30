# Basic-CRUD-PHP-MySQL
Here is a web view running on localhost.

![vid2](https://user-images.githubusercontent.com/66185022/105703821-c6a63f00-5f48-11eb-81d2-eee4b805243b.gif)

How to run this project?
1. Install XAMPP on your laptop then turn on Apache and MySQL.
2. Download or clone this repository and move the folder to C:/xampp/htdocs.
3. Now, write localhost/phpmyadmin into your browser, after that import the database.
4. Finally, access the web at localhost/belajar-crud/index.php in your browser.
<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id_zapato = $_POST['editar_zapato'];
    $id_proveedor = $_POST['editar_proveedor'];
    $estilo= $_POST['editar_estilo'];
    $color = $_POST['editar_color'];
    $precio = $_POST['editar_precio'];
    $descripcion = $_POST['editar_descripcion'];
    $talla = $_POST['editar_talla'];
    $id_venta = $_POST['editar_id_venta'];


    // query
    $sql = "UPDATE zapatos SET id_zapato='$id_zapato', id_proveedor='$id_proveedor', 
    estilo='$estilo', color='$color', precio='$precio', descripcion='$descripcion',
     id_venta='$id_venta' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");