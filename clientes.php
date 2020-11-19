<!--?php
  //Lo dejo comentado porque no tenemos el doc de la conexion aun, le puse un supuesto de la conexion en caso que vayamos a hacerla como en clases con el conbd.php

  include 'Base de datos.php';
  $conexion = Abrir();

  if(isset($_POST['btnConsultar']))
  {
	$Cedula = $_POST['txtCedula'];
  }
  else
  {
	  $Cedula = "";  
  }

//LLamado del Procedimiento Almacenado
//  $Clientes = "call ConsultarClientes('" . $Cedula . "')";
  $ListaClientes = $conexion-> query($Clientes);

  Cerrar($conexion);

?-->

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
            </nav>
            <br />
            <br />
            <br />

            <div class="row">
                <div class="col-2">
                    <label>Buscar Clientes</label>
                    <input type="text" class="form-control" id="txtCedula" name="txtCedula" />
                </div>

                <div class="col-3">
                    <label>Categoría del Cliente</label>
                    <select class="form-control" id="cboCategoria" name="cboCategoria" size="1">
                        <option value="0">--Todas--</option>
                        <option value="1">Categoria1</option>
                        <option value="2">Categoria2</option>
                    </select>
                </div>
                <div class="col-2">
                    <br />
                    <!-- <input type="submit" class="btn btn-success" id="btnConsultar" name="btnConsultar" value="buscar" /> -->
                    <button class="btn waves-effect waves-light blue accent-4 btn-large boton" type="submit" name="action">Buscar
                        <i class="material-icons left">person_search</i>
                    </button>
                </div>

                <div class="col-2">
                    <br />
                    <!-- <input type="submit" class="btn btn-info" id="btnAgregar" name="btnAgregar" value="Agregar Cliente" /> -->
                    <button class="btn waves-effect waves-light blue accent-4 btn-large boton" type="submit" name="action">Agregar Cliente
                        <i class="material-icons left">add</i>
                    </button>
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
                            <th>Nombre a Facturar</th>
                            <th>Identificación</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th>Precio</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if (empty($ListaClientes)) {
                            echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                        } else {
                            while ($fila = mysqli_fetch_array($ListaClientes)) {
                                echo '<td>' . $fila["ID"] . '</td>';
                                echo '<td>' . $fila["Nombre"] . '</td>';
                                echo '<td>' . $fila["Cedula"] . '</td>';
                                echo '<td>' . $fila["Telefono"] . '</td>';
                                echo '<td>' . $fila["Categoria"] . '</td>';
                                echo '<td>' . $fila["Precio"] . '</td>';
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

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>