<?php
include 'database.php';
$conexion = abrirConexion();


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


    $sql = "call insertarProducto('$txtCodigo', '$txtNombre','$cboCategoriaProducto', '$cboImpuesto' ,'$cboMoneda', $txtSinImp, $txtPrecio, 
    $txtGanancia, $txtCosto)";

    $conexion->next_result();

    if ($conexion->query($sql)) {
        header('Location: productos.php');
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
                                    <option value="Licor">Licor</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label>Impuesto</label>
                                <select class="form-control" id="cboImpuesto" name="cboImpuesto" size="1">
                                    <option value="0% (Exento)">0% (Exento)</option>
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
                                    <?php
                                     echo "<option value= '" . 'Colones' . "'>" . 'Colones' . "</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Costo</label>
                                <input placeholder="Costo" oninput="calcularPrecio()" type="text" class="form-control" id="txtCosto" name="txtCosto" />
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                        <div class="row">
                            <div class="col-3">
                                <label>Ganancia</label>
                                <input type="text" oninput="calcularPrecio()" class="form-control" id="txtGanancia" name="txtGanancia" />
                            </div>
                            <div class="col-3">
                                <label>Precio Sin Imp</label>
                                <input type="text" oninput="calcularPrecio()" class="form-control" id="txtSinImp" name="txtSinImp" />
                            </div>
                            <div class="col-3">
                                <label>Precio Final</label>
                                <input type="text" class="form-control" id="txtPrecio" name="txtPrecio" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <button class="btn waves-effect waves-light" type="submit" id="btnAgregar" name="btnAgregar">Agregar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        </div>

                        <br>
                        <br>

                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/calcularPrecio.js"></script>
</body>

</html>