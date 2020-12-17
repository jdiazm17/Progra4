<?php

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if (isset($_POST['btnBuscarProducto'])) {
    $Codigo = $_POST['txtNombre'];
} else {
    $Codigo = "";
}


$Productos = "call consultarProducto('" . $Codigo . "')";
$ListaProductos = $conexion->query($Productos);
cerrarConexion($conexion);

?>

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
    <form action="" method="post">
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
                            <h4>Buscar Productos</h4>
                        </div>
                        <hr>
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-3">
                                <label>Buscar Productos</label>
                                <input type="text" class="form-control" id="txtNombre" name="txtNombre" />
                            </div>

                            <div class="col-3">
                                <label>Categoría</label>
                                <select class="form-control" id="cboCategoria" name="cboCategoria" size="1">
                                    <option value="0">--Todas--</option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <br />
                                <button class="btn waves-effect waves-light blue accent-3 btn-large boton" type="submit" name="btnBuscarProducto">Buscar
                                    <i class="material-icons left">search</i>
                                </button>
                            </div>

                            <div class="col-3">
                                <br />
                                <!-- <input type="submit" class="btn btn-info" id="btnAgregar" name="btnAgregar" value="Agregar Producto" /> -->
                                <a href="agregar-producto.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">add</i>Agregar Producto</a>
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
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (empty($ListaProductos)) {
                                        echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                                    } else {
                                        while ($fila = mysqli_fetch_array($ListaProductos)) {
                                            echo '<tr>';
                                            echo '<td>' . $fila["ID_PRODUCTO"] . '</td>';
                                            echo '<td>' . $fila["CODIGO"] . '</td>';
                                            echo '<td>' . $fila["NOMBRE"] . '</td>';
                                            echo '<td id="accion"><a href="editar-producto.php?producto=' . $fila["ID_PRODUCTO"] . '" class="btn waves-effect waves-light blue accent-4"><i class="material-icons right">edit</i></a>' . '<button type="button" class="btn waves-effect waves-light red accent-4 eliminar" onclick="eliminarProducto(' . $fila["ID_PRODUCTO"] . ');"><i class="material-icons right">delete</i></button>' . '</td>';
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
    </form>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/eliminarProducto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>