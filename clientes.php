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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Kozko</a>
        <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                            <?php
                                include 'menu.php';
                            ?>
                    </ul>


                </div>
            </nav>

 
            <div class="card-body">
            <div class="row">

<div class="col-4">

</div>
<br/>
<br/>
<br/>
</div>

            <div class="row">

            <div class="col-2">
                <label>Buscar Clientes</label>
                <input type="text" class="form-control" id="txtCedula" name="txtCedula" />
            </div>


            <div class="col-3">
                <label>Factura Electrónicamente</label>
                <select class="form-control" id="cboFE" name="cboFE" size="1">
                    <option value="0">--Todas--</option>
                    <option value="1">Sí</option>
                    <option value="2">No</option>
                </select>
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
				<br/>
				<input type="submit" class="btn btn-success" id="btnConsultar" name="btnConsultar" value="buscar" />
			  </div>

              <div class="col-2">
				<br/>
				<input type="submit" class="btn btn-info" id="btnAgregar" name="btnAgregar" value="Agregar Cliente" />
			  </div>


</div>
<br/>
<br/>
<br/>
<br/>
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
                    
                        if(empty($ListaClientes))
                        {
                            echo '<tr><td colspan="7">No hay datos disponibles en la tabla</td></tr>';								
                        }
                        else
                        {
                            While($fila = mysqli_fetch_array($ListaClientes))
                            {
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