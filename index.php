<?php



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
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="container-fluid">
                <div class="card-body">
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
                    </div>
                </div>
            </div>
        </main>

        <hr>
        <h5 style="text-align: center;">Reporte</h5>

    </div>
</div>


<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/redireccion.js"></script>
</body>

</html>