<?php
include 'database.php';
$conexion = abrirConexion();

//Llamado al procedimiento almacenado
//variable $ListaPerfiles
//IdPerfil, DescripcionPerfil

if (isset($_POST['btnAgregar'])) {


    $txtCodigo = $_POST['txtCodigo'];
    $txtNombre = $_POST['txtNombre'];
    $cboCategoriaProducto = $_POST['cboCategoriaProducto'];
    $cboImpuesto = $_POST['cboImpuesto'];
    $cboMoneda = $_POST['cboMoneda'];
    $txtCosto = $_POST['txtCosto'];
    $txtGanancia = $_POST['txtGanancia'];
    $txtSinImp = $_POST['txtSinImp'];
    $txtPrecio = $_POST['txtPrecio'];


    $sql = "call insertarProducto('$txtCodigo', '$txtNombre','$cboCategoriaProducto', $cboImpuesto, $cboMoneda,$txtCosto,$txtGanancia,
    $txtSinImp, $txtPrecio)";

    $conexion->next_result();

    if ($conexion->query($sql)) {
        header('Location: index.php');
    } else {
        echo $conexion->error;
    }
}

cerrarConexion($conexion);

?>
<!DOCTYPE html>
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
                <a href="index.php">
                    <div class="sidebar-heading">Kozko</div>
                </a>
                <div class="list-group list-group-flush">
                    <?php
                    include 'menu.php';
                    ?>|
                </div>
            </div>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="card-body">
                        <h4>Agregar producto</h4>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <label>Código</label>
                                <input placeholder="Código" type="text" class="form-control" id="txtCodigo" name="txtCodigo" />
                            </div>

                            <div class="col-8">
                                <label>Nombre</label>
                                <input placeholder="Nombre" type="text" class="form-control" id="txtNombre" name="txtNombre" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label>Categoría</label>
                                <select class="form-control" id="cboCategoriaProducto" name="cboCategoriaProducto" size="1">
                                    <option value="0"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label>Categoría</label>
                                <select class="form-control" id="cboImpuesto" name="cboImpuesto" size="1">
                                    <option value="0"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                        </div>
                        <br />
                        <h4>Información del precio</h4>
                        <hr>

                        <div class="row">
                            <div class="col-3">
                                <label>Moneda</label>
                                <select class="form-control" id="cboMoneda" name="cboMoneda" size="1">
                                    <option value="0"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Costo</label>
                                <input placeholder="Costo" type="text" class="form-control" id="txtCosto" name="txtCosto" />
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                        <div class="row">
                            <div class="col-3">
                                <label>Ganancia</label>
                                <input type="text" class="form-control" id="txtGanancia" name="txtGanancia" />
                            </div>
                            <div class="col-3">
                                <label>Precio Sin Imp</label>
                                <input type="text" class="form-control" id="txtSinImp" name="txtSinImp" />
                            </div>
                            <div class="col-3">
                                <label>Precio Final</label>
                                <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button class="btn waves-effect waves-light" type="submit" name="btnAgregar">Agregar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <table class="striped resposive-table">
                                        <thead>
                                            <tr>
                                                <th>Moneda</th>
                                                <th>Costo</th>
                                                <th>Ganancia</th>
                                                <th>Precio Final</th>
                                            </tr>
                                        </thead>
                                        <!-- <tbody>
                                            <//?php
                                            // if (empty($ListaProductos)) {
                                            //     echo '<tr><td colspan="7"></td></tr>';
                                            // } else {
                                            //     while ($fila = mysqli_fetch_array($ListaProductos)) {
                                            //         echo '<td>' . $fila["ID"] . '</td>';
                                            //         echo '<td>' . $fila["Codigo"] . '</td>';
                                            //         echo '<td>' . $fila["Nombre"] . '</td>';
                                            //         echo '<td>' . $fila["Categoria"] . '</td>';
                                            //         echo '<td>' . $fila["Proveedor"] . '</td>';
                                            //         echo '<td>' . $fila["Unidad"] . '</td>';
                                            //         echo '</tr>';
                                            //     }
                                            // }
                                            // ?>
                                        </tbody> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>