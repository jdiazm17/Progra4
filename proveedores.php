<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Progra 4</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Kozko</div>
            <div class="list-group list-group-flush">
                <?php
                include 'menu.php';
                ?>
            </div>
        </div>


        <br />
        <br />
        <br />


        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="card-body">

                    <div class="row">
                        <h4>Buscar Proveedores</h4>
                    </div>
                    <hr>

                    <br />
                    <br />
                    <div class="row">
                        <div class="col-4">
                            <label>Buscar Proveedor</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" />
                        </div>
                        <div class="col-3">
                            <br />
                            <!-- <input type="submit" class="btn btn-success" id="btnConsultar" name="btnConsultar" value="Consultar" /> -->
                            <a href="#" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">search</i>Consultar</a>
                        </div>

                        <div class="col-3">
                            <br />
                            <!-- <input type="submit" class="btn btn-info" id="btnAgregar" name="btnAgregar" value="Agregar Producto" /> -->
                            <a href="agregar-proveedor.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">add</i>Agregar Producto</a>
                        </div>
                    </div>
    


                    <br />
                    <br />
                    <br />


                    <div class="row">
                        <table class="striped resposive-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Proveedor</th>
                                    <th>Unidad</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (empty($ListaProductos)) {
                                    echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                                } else {
                                    while ($fila = mysqli_fetch_array($ListaProductos)) {
                                        echo '<td>' . $fila["ID"] . '</td>';
                                        echo '<td>' . $fila["Codigo"] . '</td>';
                                        echo '<td>' . $fila["Nombre"] . '</td>';
                                        echo '<td>' . $fila["Categoria"] . '</td>';
                                        echo '<td>' . $fila["Proveedor"] . '</td>';
                                        echo '<td>' . $fila["Unidad"] . '</td>';
                                        echo '<td id="acciones"><a href="editar-cliente.php?ced=' . $fila["ID_CLIENTE"] . '" class="btn waves-effect waves-light blue accent-4"><i class="material-icons right">edit</i></a>' . '<button type="button" class="btn waves-effect waves-light red accent-4 eliminar" onclick="eliminarCliente(' . $fila["ID_CLIENTE"] . ');"><i class="material-icons right">delete</i></button>' . '</td>';
                                        echo '</tr>';
                                    }
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>