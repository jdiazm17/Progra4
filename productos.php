<!--?php
  //Lo dejo comentado porque no tenemos el doc de la conexion aun, le puse un supuesto de la conexion en caso que vayamos a hacerla como en clases con el conbd.php

  include 'Base de datos.php';
  $conexion = Abrir();

  if(isset($_POST['btnConsultar']))
  {
	$Nombre = $_POST['txtNombre'];
  }
  else
  {
	  $Nombre = "";  
  }

//LLamado del Procedimiento Almacenado
//  $Productos = "call ConsultarProductos('" . $Nombre . "')";
  $ListaProductos = $conexion-> query($Productos);

  Cerrar($conexion);

?-->

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
            </nav>
            <br>
            </br>
            <br />
            <div class="row">
                <div class="col-3">
                    <label>Buscar Productos</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" />
                </div>

                <div class="col-3">
                    <label>Categoría</label>
                    <select class="form-control" id="cboCategoria" name="cboCategoria" size="1">
                        <option value="0">--Todas--</option>
                        <option value="1">Categoria1</option>
                        <option value="2">Categoria2</option>
                    </select>
                </div>
                <div class="col-3">
                    <br />
                    <!-- <input type="submit" class="btn btn-success" id="btnConsultar" name="btnConsultar" value="Consultar" /> -->
                    <a href="#" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">search</i>Consultar</a>
                </div>

                <div class="col-3">
                    <br />
                    <!-- <input type="submit" class="btn btn-info" id="btnAgregar" name="btnAgregar" value="Agregar Producto" /> -->
                    <a href="agregar-producto.php" class="waves-effect waves-light btn-large blue accent-3 boton"><i class="material-icons left">add</i>Agregar Producto</a>
                </div>
            </div>

            <br />
            <br />
            <br />


            <div class="row">
                <table class="striped resposive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th>Unidad</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        if (empty($ListaProductos)) {
                            echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';
                        } else {
                            while ($fila = mysqli_fetch_array($ListaProductos)) {
                                echo '<td>' . $fila["ID"] . '</td>';
                                echo '<td>' . $fila["Codigo"] . '</td>';
                                echo '<td>' . $fila["Nombre"] . '</td>';
                                echo '<td>' . $fila["Categoria"] . '</td>';
                                echo '<td>' . $fila["Proveedor"] . '</td>';
                                echo '<td>' . $fila["Unidad"] . '</td>';
                                echo '</tr>';
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
</body>