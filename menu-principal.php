<?php

include 'validar-usuario.php';
validarUsuario();

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>


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
    <br />


    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="card-body">
                <h5 style="text-align: right;">
                    Bienvenid@ - <?php echo $_SESSION["Nombre"]; ?>
                </h5>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <br />
                        <!--     <a href="proforma.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProforma" name="btnProforma">Proforma</button> -->
                        <a href="proforma.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">description</i>Proforma</a>
                    </div>
                    <div class="col-4">
                        <br />
                        <!-- <a href="productos.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProductos" name="btnProductos">Productos</button> -->
                        <a href="productos.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">local_grocery_store</i>Productos</a>
                    </div>
                    <div class="col-4">
                        <br />
                        <!--  <a href="proveedores.php"><button type="submit" class="btn btn-primary btn-lg" id="btnProveedores" name="btnAgregar">Proveedores</button> -->
                        <a href="proveedores.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">local_shipping</i>Proveedores</a>

                    </div>
                    <div class="col-4">
                        <br />
                        <!-- <a href="clientes.php"><button type="submit" class="btn btn-primary btn-lg" id="btnClientes" name="btnAgregar">Clientes</button> -->
                        <a href="clientes.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">people</i>Clientes</a>
                    </div>
                    <div class="col-4">
                        <br />
                        <!-- <a href="reportes.php" class="btn btn-success"><i class="material-icons left">contact_phone</i>Proveedores</a> -->
                        <a href="reportes.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">insert_chart_outlined</i>Reportes</a>
                    </div>
                    <div class="col-4">
                        <br />
                        <!-- <a href="reportes.php" class="btn btn-success"><i class="material-icons left">contact_phone</i>Proveedores</a> -->
                        <a href="reservas.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">book_online</i>Reservas</a>
                    </div>
                </div>
            </div>
        </div>
        </main>

        <hr>
        <h5 style="text-align: center;">Reporte</h5>

    </div>
</div>


<!-- Bootstrap JS -->

</body>

</html>