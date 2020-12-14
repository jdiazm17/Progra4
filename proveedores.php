<?php

include 'database.php';
$conexion = abrirConexion();

//se guarda la conexion de la BD porque despues se necesita cerrar la conexion abierta, luego aqui programamos todo y se termina cerrando la conexion

if (isset($_POST['btnBuscarProveedor']))
{
    $ID_Proveedor = $_POST['txtIdProveedor'];

}
else{
    $ID_Proveedor = "";
}

$Proveedores = "call consultarProveedores ('" .$ID_Proveedor . "')";
$ListaProveedores = $conexion -> query($Proveedores);


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
                        <h4>Buscar Proveedores</h4>
                    </div>
                    <hr>

                    <br />
                    <br />
                    <div class="row">
                    <div class="col-4">
                                <label>Buscar Proveedores</label>
                                <input type="text" class="form-control" id="txtIdProveedor" name="txtIdProveedor" />
                            </div>
                            <div class="col-3">
                                <br />
                                <button class="btn waves-effect waves-light blue accent-4 btn-large boton" type="submit" name="btnBuscarProveedor">Buscar
                                    <i class="material-icons left">person_search</i>
                                </button>
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
                                    <th>Nombre del Proveedor</th>
                                    <th>ID</th>
                                    <th>Nombre del Contacto</th>
                                    <th>Correo Electrónico</th>
                                    <th>Telefóno 1</th>
                                    <th>Telefóno 2</th>
                                    <th>Dirección</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (empty($ListaProveedores)) {
                                    echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                                } else {
                                    while ($fila = mysqli_fetch_array($ListaProveedores)) {
                                        echo '<td>' . $fila["Nombre_Proveedor"] . '</td>';
                                        echo '<td>' . $fila["ID_Proveedor"] . '</td>';
                                        echo '<td>' . $fila["Nombre_Contacto"] . '</td>';
                                        echo '<td>' . $fila["Correo_Electronico"] . '</td>';
                                        echo '<td>' . $fila["Telefono1"] . '</td>';
                                        echo '<td>' . $fila["Telefono2"] . '</td>';
                                        echo '<td>' . $fila["Direccion"] . '</td>';
                                        echo '<td>' . $fila["Producto"] . '</td>';
                                        echo '<td>' . $fila["Precio"] . '</td>';
                                        echo '<td><a href="editar-proveedor.php?id_prov=' . $fila["ID_Proveedor"] . '">Editar</a>' . '</td>';
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
</form>
</body>