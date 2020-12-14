<?php

include 'database.php';
$conexion = abrirConexion();

//Llamado al procedimiento almacenado
//variable $ListaPerfiles
//IdPerfil, DescripcionPerfil

if (isset($_POST['btnAgregar'])) {

    $txtNombreProveedor = $_POST['txtNombreProveedor'];
    $txtIdProveedor = $_POST['txtIdProveedor'];
    $txtNombreContacto = $_POST['txtNombreContacto'];
    $txtCorreo = $_POST['txtCorreo'];
    $txtTelefono1 = $_POST['txtTelefono1'];
    $txtTelefono2 = $_POST['txtTelefono2'];
    $txtDireccion = $_POST['txtDireccion'];
    $txtProducto = $_POST['txtProducto'];
    $txtPrecioProducto = $_POST['txtPrecioProducto'];


    

    $sql = "call insertarProveedor('$txtNombreProveedor','$txtIdProveedor', '$txtNombreContacto', '$txtCorreo','$txtTelefono1','$txtTelefono2','$txtDireccion','$txtProducto', $txtPrecioProducto)";

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
                        <h4>Agregar proveedor</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>Nombre del proveedor</label>
                                <input placeholder="Nombre del proveedor" type="text" class="form-control" id="txtNombreProveedor" name="txtNombreProveedor" />
                            </div>
                            <div class="col-3">
                                <label>Número de identificación</label>
                                <input placeholder="Número de identificación" type="text" class="form-control" id="txtIdProveedor" name="txtIdProveedor" />
                            </div>
                            <div class="col-3">
                                <label>Nombre del contacto</label>
                                <input placeholder="Nombre del contacto" type="text" class="form-control" id="txtNombreContacto" name="txtNombreContacto" />
                            </div>
                            <div class="col-3">
                                <label>Correo electrónico</label>
                                <input placeholder="Correo electrónico" type="text" class="form-control" id="txtCorreo" name="txtCorreo" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label>Telefóno #1</label>
                                <input placeholder="" type="text" class="form-control" id="txtTelefono1" name="txtTelefono1" />
                            </div>

                            <div class="col-3">
                                <label>Telefóno #2</label>
                                <input placeholder="" type="text" class="form-control" id="txtTelefono2" name="txtTelefono2" />
                            </div>
                            <div class="col-6">
                                <label>Dirección</label>
                                <input placeholder="Dirección" type="text" class="form-control" id="txtDireccion" name="txtDireccion" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Producto que ofrece</label>
                                <input placeholder="Producto" type="text" class="form-control" id="txtProducto" name="txtProducto" />
                            </div>
                            <div class="col-6">
                                <label>Precio de costo</label>
                                <input placeholder="Precio de costo" type="text" class="form-control" id="txtPrecioProducto" name="txtPrecioProducto" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <a href="proveedores.php" class="btn waves-effect waves-light red accent-4"><i class="material-icons left"></i>Regresar</a>
                            </div>
                            <div class="col-3">
                                <button class="btn waves-effect waves-light blue accent-4" type="submit" name="btnAgregar">Agregar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </form>

</body>

</html>