<?php
//Lo dejo comentado porque no tenemos el doc de la conexion aun, le puse un supuesto de la conexion en caso que vayamos a hacerla como en clases con el conbd.php

include 'database.php';
$conexion = abrirConexion();

if (isset($_POST['btnBuscarCliente'])) {
    $Cedula = $_POST['txtCedula'];
} else {
    $Cedula = "";
}


$Clientes = "call consultarCliente('" . $Cedula . "')";
$ListaClientes = $conexion->query($Clientes);
cerrarConexion($conexion);

?>

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
    <div class="d-flex" id="wrapper">
        <div class="border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Kozko</div>
            <div class="list-group list-group-flush">
                <?php
                include 'menu.php';
                ?>
            </div>
        </div>



        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="row">
                        <h4>Buscar Cliente</h4>
                    </div>
                    <hr>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-4">
                            <label>Buscar Clientes</label>
                            <input type="text" class="form-control" id="txtCedula" name="txtCedula" />
                        </div>
                        <div class="col-3">
                            <br />
                            <button class="btn waves-effect waves-light blue accent-4 btn-large boton" type="button" name="btnBuscarCliente">Buscar
                                <i class="material-icons left">person_search</i>
                            </button>
                        </div>

                        <div class="col-3">
                            <br />
                            <a href="agregar-cliente.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">add</i>Agregar Cliente</a>
                        </div>


                    </div>
                    <br />
                    <br />
                    <br />
                    <br />
                    <div class="row">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Cliente</th>
                                    <th>Nombre Cliente</th>
                                    <th>Nombre a Facturar</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                if (empty($ListaClientes)) {
                                    echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                                } else {
                                    while ($fila = mysqli_fetch_array($ListaClientes)) {
                                        echo '<td>' . $fila["ID_CLIENTE"] . '</td>';
                                        echo '<td>' . $fila["NOMBRE"] . '</td>';
                                        echo '<td>' . $fila["NOMBRE_PROFORMA"] . '</td>';
                                        echo '<td>' . $fila["TELEFONO"] . '</td>';
                                        echo '<td>' . $fila["CORREO"] . '</td>';
                                        echo '<td><a href="editar-cliente.php?ced='. $fila["ID_CLIENTE"] .'">Actualizar</a>' . '</td>';
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
    </div>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>