<?php

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if (isset($_POST['btnAgregar'])) {
    $txtNombre = $_POST['txtNombre'];
    $dtFechaNaci = $_POST['dtFechaNaci'];
    $txtCedula = $_POST['txtCedula'];
    $txtCorreo = $_POST['txtCorreo'];
    $txtDireccion = $_POST['txtDireccion'];
    $txtCantidad = $_POST['txtCantidad'];
    $dtFechaRetiro = $_POST['dtFechaRetiro'];
    $dtFechaNaciFormat =  date('Y-m-d', strtotime($dtFechaNaci));
    $dtFechaRetiroFormat =  date('Y-m-d', strtotime($dtFechaRetiro));
    $cboNombre = $_POST["cboNombre"];

    $sql = "call insertarReserva('$txtNombre','$dtFechaNaciFormat', '$txtCedula', '$txtCorreo','$txtDireccion', $txtCantidad, '$dtFechaRetiroFormat', $cboNombre)";
    $sql2 = "call eliminarInventario($cboNombre, $txtCantidad)";

    $conexion->next_result();
    if ($conexion->query($sql) && $conexion->query($sql2)) {
        header('Location: reservas.php');
    } else {
        echo $conexion->error;
    }
}

if (isset($_POST['btnBuscarReserva'])) {
    $reserva = $_POST['txtReserva'];
} else {
    $reserva = "";
}

$sql = "call consultarReservas('" . $reserva . "')";
$ListaReservas = $conexion->query($sql);
$conexion->next_result();
$Productos = "call consultarProducto('')";
$ListaProductos = $conexion->query($Productos);

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
                <div class="sidebar-heading">Kozko</div>
                <div class="list-group list-group-flush">
                    <?php
                    include 'menu.php';
                    ?>|
                </div>
            </div>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="card-body">
                        <h4>Agregar reserva</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>Nombre del cliente</label>
                                <input placeholder="Nombre del cliente" autocomplete="off" type="text" class="form-control" id="txtNombre" name="txtNombre" />
                            </div>
                            <div class="col-3">
                                <label>Fecha Nacimiento</label>
                                <input placeholder="Fecha de nacimiento" name="dtFechaNaci" id="datepicker" type="text" class="datepicker">
                            </div>
                            <div class="col-3">
                                <label>Identificación</label>
                                <input placeholder="Número de identificación" type="text" class="form-control" id="txtCedula" name="txtCedula" />
                            </div>
                            <div class="col-3">
                                <label>Correo electrónico</label>
                                <input placeholder="Correo electrónico" type="text" class="form-control" id="txtCorreo" name="txtCorreo" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Dirección</label>
                                <input placeholder="Dirección" type="text" class="form-control" name="txtDireccion" />
                            </div>
                            <div class="col-6">
                                <label>Producto / Cantidad en inventario</label>
                                <select class="form-control" name="cboNombre" size="1">
                                    <?php
                                    while ($producto = mysqli_fetch_array($ListaProductos)) {
                                        echo "<option value=" . $producto["ID_PRODUCTO"] . ">" . $producto["NOMBRE"] .  " - " . $producto["INVENTARIO"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Cantidad de producto deseado</label>
                                <input placeholder="Cantidad" type="text" class="form-control" id="txtCantidad" name="txtCantidad" />
                            </div>
                            <div class="col-6">
                                <label>Fecha de retiro</label>
                                <input placeholder="Fecha de retiro" type="text" name="dtFechaRetiro" id="datepicker" class="datepicker">
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
                        <br />

                        <h4>Ver reservas</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>Buscar Reservas</label>
                                <input type="text" class="form-control" id="txtReserva" name="txtReserva" />
                            </div>
                            <div class="col-3">
                                <br />
                                <button class="btn waves-effect waves-light blue accent-4 boton" type="submit" name="btnBuscarReserva">Buscar
                                    <i class="material-icons left">search</i>
                                </button>
                            </div>
                        </div>
                        </br>
                        </br>
                        <div class="row">
                            <table id="tabla" name="tabla" class="striped resposive-table">
                                <thead>
                                    <tr>
                                        <th>ID Orden</th>
                                        <th>Nombre Cliente</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de retiro</th>
                                        <th>...</th>
                                        <hr>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if (empty($ListaReservas)) {
                                        echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                                    } else {
                                        while ($fila = mysqli_fetch_array($ListaReservas)) {
                                            echo '<tr>';
                                            echo '<td>' . $fila["ID_RESERVA"] . '</td>';
                                            echo '<td>' . $fila["NOMBRE"] . '</td>';
                                            echo '<td>' . $fila["CANTIDAD"] . '</td>';
                                            echo '<td id="fechaRetiro">' . $fila["FECHA_RETIRO"] . '</td>';
                                            echo '<td id="accionReserva"><a href="editar-reserva.php?id=' . $fila["ID_RESERVA"] . '" class="btn waves-effect waves-light blue accent-4"><i class="material-icons right">edit</i></a>' . '<button type="button" class="btn waves-effect waves-light red accent-4 eliminar" onclick="eliminarReserva(' . $fila["ID_RESERVA"] . ');"><i class="material-icons right">delete</i></button>' . '<button type="button" class="btn waves-effect waves-light green accent-4 eliminar" onclick="confirmarReserva(' . $fila["ID_RESERVA"] . ');"><i class="material-icons right">check</i></button>' . '</td>';
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

            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="js/eliminarReserva.js"></script>

            <script>
                $(document).ready(function() {
                    $('.datepicker').datepicker();
                });
            </script>
        </div>
    </form>
</body>

</html>