<?php
//Lo dejo comentado porque no tenemos el doc de la conexion aun, le puse un supuesto de la conexion en caso que vayamos a hacerla como en clases con el conbd.php

include 'database.php';
$conexion = abrirConexion();



$Clientes = "SELECT * FROM CLIENTE";
$ListaClientes = $conexion->query($Clientes);
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
                        <h4>Proforma</h4>
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <label>Cliente</label>
                                <select class="form-control" id="cboCliente" name="cboCliente" size="1">
                                    <?php
                                    echo "<option value='0'>Seleccione</option>";
                                    while ($Cliente = mysqli_fetch_array($ListaClientes)) {
                                        echo "<option value=" . $Cliente['NOMBRE_PROFORMA'] . ">" . $Cliente["NOMBRE_PROFORMA"] .  "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br />
                        <br />
                        <br />
                        <div class="row">
                            <div class="col-6">
                                <label>Código</label>
                                <input placeholder="Código" type="text" class="form-control" id="txtCodigo" name="txtCodigo" />
                            </div>
                            <div class="col-2">
                                <label>Cantidad</label>
                                <input placeholder="Cantidad" type="text" class="form-control" id="txtCantidad" name="txtCantidad" />
                            </div>
                            <div class="col-2">
                                <br />
                                <br />
                                <button class="btn blue accent-4 waves-light" type="submit" name="btnAgregar">Agregar
                                    <i class="material-icons right">add</i>
                                </button>
                            </div>
                            <div class="col-2">
                                <br />
                                <br />
                                <a class="waves-effect blue accent-4 btn modal-trigger" href="#modalProforma">Proforma</a>
                                <div id="modalProforma" class="modal">
                                    <div class="modal-content">
                                        <h4>Proforma</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <h4>Monto del Pago</h4>
                                                <label>Cantidad</label>
                                                <input placeholder="" type="text" class="form-control" id="txtCantidad" name="txtCantidad" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <label>
                                                    <input type="radio" name="group1">
                                                    <span>Efectivo</span>
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label>
                                                    <input type="radio" name="group1">
                                                    <span>SINPE</span>
                                                </label>
                                            </div>
                                            <div class="col-4">
                                                <label>
                                                    <input type="radio" name="group1">
                                                    <span>Transferencia</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <label>Monto</label>
                                                <input placeholder="" type="text" class="form-control" id="txtMonto" name="txtMonto" readonly />
                                            </div>
                                            <div class="col-6">
                                                <label>Devolución</label>
                                                <input placeholder="Monto a devolver" type="text" class="form-control" id="txtDevolucion" name="txtDevolucion" readonly />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-6">
                                                <br />
                                                <a href="#!" class="modal-close waves-effect red accent-4 btn">Cancelar</a>
                                            </div>
                                            <div class="col-6">
                                                <br />
                                                <a href="#!" class="modal-close waves-effect  blue accent-4 btn">Confirmar Pago</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <table class="striped resposive-table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Total</th>
                                        <hr>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
    </script>

</body>

</html>