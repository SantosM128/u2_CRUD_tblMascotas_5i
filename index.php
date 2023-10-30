<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conceptos básicos de CRUD con PHP y MySQL">
    <title>Veterinaria Vst</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Veterinaria Melanie Santos Requenes 5-i</a>
            
        </div>
    </nav>


    <div class="container mt-5">
        <!-- agregar formulario de mascota -->
        <div class="card mb-5">
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Veterinaria Pets vst | Tabla Mascotas</h3>
                <p class="card-text">Buscamos ser un Hospital Veterinario reconocido por regirse con normas de bienestar animal y de excelencia profesional, donde estudiantes e investigadores generen conocimientos en la Práctica de la Medicina Veterinaria. Convertir al Hospital y a sus servicios diagnósticos y farmacéuticos como principal punto de referencia de la región.</p>

                <!-- mostrar mensaje de éxito agregado -->
                <?php if (isset($_GET['estado'])) : ?>
                    <?php
                    if ($_GET['estado'] == 'Exitoso')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se pudieron agregar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-12">
                        <label for="Nombre" class="form-label">Nombre</label>
                        <input type="text" name="Nombre" class="form-control" placeholder="Bebe" required>
                    </div>
                    <div class="col-md-4">
                        <label for="Raza" class="form-label">Raza</label>
                        <input type="text" name="Raza" class="form-control" placeholder="Domestico" required>
                    </div>

                    <div class="col-md-4">
                    <label for="Especie" class="form-label">Especie</label>
                    <input type="text" name="Especie" class="form-control" placeholder="Canino" required>
                    </div>

                    <div class="col-md-4">
                      <label for="Genero" class="form-label">Genero</label>
                      <input type="text" name="Genero" class="form-control" placeholder="hembra-macho" required>
                           
                        
                    </div>

                    <div class="col-md-4">
                        <label for="id_Cli" class="form-label">id_Cliente</label>
                        <input type="text" name="id_Cli" class="form-control" placeholder="id_Cliente" required>
                    </div>

                    <div class="col-md-6">
                        <label for="FechaN" class="form-label">Fecha Nacimiento</label>
                        <input type="date" step=0.01 name="FechaN" class=" form-control" required>
                    </div>

                    <div class="col-md-6">
                            <label for="id_HistorialM" class="form-label">id_HistorialM</label>
                            <input type="text" name="id_HistorialM" class="form-control" placeholder="id_HistorialM" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="agregar"><i class="fa fa-plus"></i><span class="ms-2">Agregar Datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">Mascotas</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'Exitoso')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se pudieron eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>


        <?php if (isset($_GET['editar'])) : ?>
            <?php
            if ($_GET['editar'] == 'Exitoso')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Éxitoso!</strong>¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>¡Ups!</strong> ¡No se pudieron actualizar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Consulta</th>";
            
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Raza</th>";
            echo "<th scope='col'>Especie</th>";
            echo "<th scope='col'>Genero</th>";
            echo "<th scope='col'>Id Cliente</th>";
            echo "<th scope='col'>Fecha nacimiento</th>";
            echo "<th scope='col'>Id HistorialM</th>";
            echo "<th scope='col' class='text-center'>Opcion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_principal = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $anterior = $pagina - 1;
            $siguiente = $pagina + 1;

            $datos = mysqli_query($db, "SELECT * FROM tbl_mascotas ");
            $cantidad_datos = mysqli_num_rows($datos);
            $total_pagina = ceil($cantidad_datos / $limite);

            $datos_mascotas = mysqli_query($db, "SELECT * FROM tbl_mascotas LIMIT $pagina_principal, $limite");
            $id_Masc = $pagina_principal + 1;

            // $sql = "SELECT * FROM tbl_mascotas";
            // $query = mysqli_query($db, $sql);




            while ($tbl_mascotas = mysqli_fetch_array($datos_mascotas)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $tbl_mascotas['id_Masc'] . "</td>";
                echo "<td class='text-center'>" . $id_Masc++ . "</td>";
                echo "<td>" . $tbl_mascotas['Nombre'] . "</td>";
                echo "<td>" . $tbl_mascotas['Raza'] . "</td>";
                echo "<td>" . $tbl_mascotas['Especie'] . "</td>";
                echo "<td>" . $tbl_mascotas['Genero'] . "</td>";
                echo "<td>" . $tbl_mascotas['id_Cli'] . "</td>";
                echo "<td>" . $tbl_mascotas['FechaN'] . "</td>";
                echo "<td>" . $tbl_mascotas['id_HistorialM'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary btnEditar pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                
                echo "
                            <button type='button' class='btn btn-danger btnEliminar pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_datos == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total de entradas: $cantidad_datos </p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$anterior'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$siguiente'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!--Modal Editar-->
        <div class='modal fade' style="top:58px !important;" id='editarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar Datos de tabla "Mascotas"</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM tbl_mascotas";
                    $query = mysqli_query($db, $sql);
                    $tbl_mascotas = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='editar_id_Masc' id='editar_id_Masc'>

                   

                    <div class="col-12">
                        <label for="editar_Nombre" class="form-label">Nombre</label>
                        <input type="text" name="editar_Nombre" id="editar_Nombre" class="form-control" placeholder="Willie" required>
                    </div>
                    <div class="col-12">
                        <label for="editar_Especie" class="form-label">Especie</label>
                        <input type="text" name="editar_Especie" id="editar_Especie" class="form-control" placeholder="Canino" required>
                    </div>
                    <div class="col-md-4">
                        <label for="editar_Raza" class="form-label">Raza</label>
                        <input type="text" name="editar_Raza" id="editar_Raza" class="form-control" placeholder="Domestico" required>
                    </div>

                    <div class="col-md-4">
                        <label for="editar_Genero" class="form-label">Genero</label>
                        <input type="text" name="editar_Genero" id="editar_Genero" class="form-control" placeholder="Hembra" required>
                    </div>

                    <div class="col-md-4">
                        <label for="editar_id_Cli" class="form-label">Id Cliente</label>
                        <input type="text" name="editar_id_Cli" id="editar_id_Cli" class="form-control" placeholder="Id Cliente" required>
                    </div>

                    <div class="col-md-6">
                        <label for="editar_FechaN" class="form-label">Fecha Nacimiento</label>
                        <input type="text" name="editar_FechaN" id="editar_FechaN" class="form-control" placeholder="06-05-2006" required>
                    </div>

                    <div class="col-md-6">
                        <label for="editar_id_HistorialM" class="form-label">Id HistorialM</label>
                        <input type="text" name="editar_id_HistorialM" id="editar_id_HistorialM" class="form-control" placeholder="Id HistorialM" required>
                    </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_datos' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Eliminar-->
        <div class='modal fade' style="top:58px !important;" id='eliminarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='eliminar_id' id='eliminar_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='eliminardatos' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Paquete de Javascript con arranque popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Funcion Editar -->
    <script>
        $(document).ready(function() {
            $('.btnEditar').on('click', function() {
                $('#editarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#editar_id_Masc').val(data[0]);
                // No lo uso porque es solo un número incremental.
                // $('#no').val(data[1]);
                
                $('#editar_Nombre').val(data[2]);
                $('#editar_Raza').val(data[3]);
                $('#editar_Especie').val(data[4]);
                $('#editar_Genero').val(data[5]);
                $('#editar_id_Cli').val(data[6]);
                $('#editar_FechaN').val(data[7]);
                $('#editar_id_HistorialM').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.btnEliminar').on('click', function() {
                $('#eliminarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eliminar_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>