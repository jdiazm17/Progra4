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
                        <h4>Agregar cliente</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>Nombre del proveedor</label>
                                <input placeholder="Nombre del proveedor" type="text" class="form-control" id="txtCedula" name="txtCedula" />
                            </div>
                            <div class="col-3">
                                <label>Número de identificación</label>
                                <input placeholder="Número de identificación" type="text" class="form-control" id="txtCedula" name="txtCedula" />
                            </div>
                            <div class="col-3">
                                <label>Nombre del contacto</label>
                                <input placeholder="Nombre del cliente" type="text" class="form-control" id="txtNombreCliente" name="txtNombreCliente" />
                            </div>
                            <div class="col-3">
                                <label>Correo electrónico</label>
                                <input placeholder="Correo electrónico" type="text" class="form-control" id="txtNombreFacturar" name="txtNombreFacturar" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label>Telefóno #1</label>
                                <input placeholder="" type="text" class="form-control" id="txtCorreo" name="txtCorreo" />
                            </div>

                            <div class="col-3">
                                <label>Telefóno #2</label>
                                <input placeholder="" type="text" class="form-control" id="txtNumero" name="txtNumero" />
                            </div>
                            <div class="col-6">
                                <label>Dirección</label>
                                <input placeholder="Dirección" type="text" class="form-control" id="txtNumero" name="txtNumero" />
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