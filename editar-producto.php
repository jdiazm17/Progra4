<?php

$productoSeleccionado = $_GET['producto'];

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if (isset($_POST["btnActualizar"])) {
    $txtCodigo = $_POST['txtCodigo'];
    $txtNombre = $_POST['txtNombre'];
    $cboCategoriaProducto = $_POST['cboCategoriaProducto'];
    $cboImpuesto = $_POST['cboImpuesto'];
    $cboMoneda = $_POST['cboMoneda'];
    $txtCosto = $_POST['txtCosto'];
    $txtGanancia = $_POST['txtGanancia'];
    $txtSinImp = $_POST['txtSinImp'];
    $txtPrecio = $_POST['txtPrecio'];

    $sql = "call editarProducto('$productoSeleccionado','$txtNombre', '$cboCategoriaProducto', '$txtCodigo','$cboImpuesto', '$cboMoneda', $txtCosto, 
    $txtGanancia, $txtSinImp, $txtPrecio)";
    if ($conexion->query($sql)) {
        header('Location: productos.php');
    } else {
        echo $conexion->error;
    }
}

$Productos = "call consultarProductoID('" . $productoSeleccionado . "')";
$resultado = $conexion->query($Productos);
$Registro = mysqli_fetch_array($resultado);


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
                        <h4>Editar producto</h4>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <label>Código</label>
                                <input placeholder="Código" type="text" class="form-control" id="txtCodigo" name="txtCodigo" value="<?php if (!empty($productoSeleccionado)) echo $productoSeleccionado; ?>" />
                            </div>

                            <div class="col-8">
                                <label>Nombre</label>
                                <input placeholder="Nombre" type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $Registro["NOMBRE"]; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label>Categoría</label>
                                <select class="form-control" id="cboCategoriaProducto" name="cboCategoriaProducto" size="1">
                                    <?php
                                    echo "<option value= '" . $Registro["CATEGORIA"] . "'>" . $Registro["CATEGORIA"] . "</option>";
                                    ?>
                                </select>
                            </div>

                            <div class="col-3">
                                <label>Impuesto</label>
                                <select class="form-control" id="cboImpuesto" name="cboImpuesto" size="1">
                                    <option value="0"><?php echo $Registro["IMPUESTO"]; ?></option>
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
                                    <option value="0"><?php echo $Registro["MONEDA"]; ?></option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Costo</label>
                                <input placeholder="Costo" oninput="calcularPrecio()" type="number" class="form-control" id="txtCosto" name="txtCosto" value="<?php echo $Registro["COSTO"]; ?>" />
                            </div>
                            <div class="col-3">
                                <label>Inventario</label>
                                <input placeholder="Inventario" type="number" class="form-control" id="txtInventario" name="txtInventario"
                                value="<?php echo $Registro["INVENTARIO"]; ?>"/>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                        <div class="row">
                            <div class="col-3">
                                <label>Ganancia</label>
                                <input type="number" oninput="calcularPrecio()" class="form-control" id="txtGanancia" name="txtGanancia" value="<?php echo $Registro["GANANCIA"]; ?>" />
                            </div>
                            <div class="col-3">
                                <label>Precio Sin Imp</label>
                                <input type="number" oninput="calcularPrecio()" class="form-control" id="txtSinImp" name="txtSinImp" value="<?php echo $Registro["PRECIO_IMP"]; ?>" />
                            </div>
                            <div class="col-3">
                                <label>Precio Final</label>
                                <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" value="<?php echo $Registro["PRECIO_FINAL"]; ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <a href="productos.php" class="btn waves-effect waves-light red accent-4"><i class="material-icons left"></i>Regresar</a>
                            </div>
                            <div class="col-4">
                                <button class="btn waves-effect waves-light blue accent-4" type="submit" name="btnActualizar">Guardar
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
    <script src="js/calcularPrecio.js"></script>
</body>


</html>