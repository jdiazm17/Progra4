<?php

$cedulaSeleccionada = $_GET['ced'];

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if(isset($_POST["btnActualizar"])) {
    $txtNombreCliente = $_POST['txtNombreCliente'];
    $txtNombreFacturar = $_POST['txtNombreFacturar'];
    $txtCorreo = $_POST['txtCorreo'];
    $txtNumero = $_POST['txtNumero'];
    $sql = "call editarCliente('$cedulaSeleccionada','$txtNombreCliente', '$txtNombreFacturar', '$txtNumero', '$txtCorreo')";
    if ($conexion->query($sql)) {
        header('Location: clientes.php');
    } else {
        echo $conexion->error;
    }
}

$Clientes = "call consultarCliente('" . $cedulaSeleccionada . "')";
$resultado = $conexion->query($Clientes);
$Registro = mysqli_fetch_array($resultado);


cerrarConexion($conexion);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Progra 4</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/simple-sidebar.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                        <h4>Editar cliente</h4>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <label>Número de identificación</label>
                                <input type="text" class="form-control" id="txtCedula" name="txtCedula" readonly="true" 
                                value="<?php if(!empty($cedulaSeleccionada)) echo $cedulaSeleccionada; ?>"/>
                            </div>
                            <div class="col-8">
                                <br />
                                <button onclick="obtenerDatos()" class="btn waves-effect waves-light blue accent-4" type="button" name="btnBuscar">Buscar
                                    <i class="material-icons right">search</i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Nombre del cliente</label>
                                <input placeholder="Nombre del cliente" type="text" class="form-control" id="txtNombreCliente" name="txtNombreCliente"
                                value="<?php echo $Registro["NOMBRE"]; ?>"/>
                            </div>

                            <div class="col-6">
                                <label>Nombre a facturar</label>
                                <input placeholder="Nombre a facturar" type="text" class="form-control" id="txtNombreFacturar" name="txtNombreFacturar" 
                                value="<?php echo $Registro["NOMBRE_PROFORMA"]; ?>"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Correo elctrónico</label>
                                <input placeholder="Correo electrónico" type="text" class="form-control" id="txtCorreo" name="txtCorreo" 
                                value="<?php echo $Registro["CORREO"]; ?>"/>
                            </div>

                            <div class="col-6">
                                <label>Número de teléfono</label>
                                <input placeholder="Número de teléfono" type="number" class="form-control" id="txtNumero" name="txtNumero" 
                                value="<?php echo $Registro["TELEFONO"]; ?>"/>
                            </div>
                        </div>
                        <br />
                        <br />
                        <h4>Dirección</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>País</label>
                                <select class="form-control" id="cboPais" name="cboPais" size="1">
                                    <option value="País"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Provincia</label>
                                <select class="form-control" id="cboProvincia" name="cboProvincia" size="1">
                                    <option value="Provincias"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Cantón</label>
                                <select class="form-control" id="cboCanton" name="cboCanton" size="1">
                                    <option value="Canton"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label>Distrito</label>
                                <select class="form-control" id="cboDistrito" name="cboDistrito" size="1">
                                    <option value="País"></option>
                                    <option value="1">Categoria1</option>
                                    <option value="2">Categoria2</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Dirección</label>
                                <input placeholder="Dirección" type="text" class="form-control" id="txtDireccion" name="txtDireccion" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Otras señas</label>
                                <input placeholder="Otras señas" type="text" class="form-control" id="txtSenias" name="txtSenias" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <a href="clientes.php" class="btn waves-effect waves-light red accent-4"><i class="material-icons left"></i>Regresar</a>
                            </div>
                            <div class="col-4">
                                <button class="btn waves-effect waves-light blue accent-4" type="submit" name="btnActualizar">Guardar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>