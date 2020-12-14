<?php

  $ID_Proveedor = $_GET['id_prov'];
	include 'database.php';
	$conexion = abrirConexion();

	if(isset($_POST['btnActualizar']))
	{
    $NombreProveedor = $_POST['txtNombreProveedor'];
    $NombreContacto = $_POST['txtNombreContacto'];
    $Correo = $_POST['txtCorreo'];
    $Telefono1 = $_POST['txtTelefono1'];
    $Telefono2 = $_POST['txtTelefono2'];
    $Direccion = $_POST['txtDireccion'];
    $Producto = $_POST['txtProducto'];
    $PrecioProducto = $_POST['txtPrecioProducto'];
    
		$proc = "call ActualizarProveedor('$NombreProveedor', '$NombreContacto' , '$Correo', '$Telefono1', '$Telefono2', '$Direccion', '$Producto', $PrecioProducto, $ID_Proveedor)";
		$conexion -> next_result();
		
		if($conexion -> query($proc))
		{
			header('Location: proveedores.php');
		}
		else		
		{
			echo "Error:" . $conexion->error;			
		}
	}
	
	if(isset($_POST['btnEliminar']))
	{
		$proc = "call EliminarProveedor($ID_Proveedor)";
		$conexion -> next_result();
		
		if($conexion -> query($proc))
		{
			header('Location: proveedores.php');
		}
		else		
		{
			echo "Error:" . $conexion->error;			
		}
	}
	
	$proveedores = "CALL consultarProveedores($ID_Proveedor)"; 
	$listaProveedor = $conexion -> query($proveedores);
	$row = mysqli_fetch_array($listaProveedor);
		
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
                        <h4>Editar proveedor</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <label>Nombre del proveedor</label>
                                <input type="text" class="form-control" id="txtNombreProveedor" name="txtNombreProveedor" value="<?php echo $row["Nombre_Proveedor"]; ?>">
                            </div>
                            <div class="col-3">
                                <label>Número de identificación</label>
                                <input placeholder="Número de identificación" type="text" class="form-control" id="txtIdProveedor" name="txtIdProveedor" readonly="true" value="<?php if (!empty($ID_Proveedor)) echo $ID_Proveedor; ?>" />

                            </div>
                            <div class="col-3">
                                <label>Nombre del contacto</label>
                                <input placeholder="Nombre del contacto" type="text" class="form-control" id="txtNombreContacto" name="txtNombreContacto" value="<?php echo $row["Nombre_Contacto"]; ?>">
                            </div>
                            <div class="col-3">
                                <label>Correo electrónico</label>
                                <input placeholder="Correo electrónico" type="text" class="form-control" id="txtCorreo" name="txtCorreo" value="<?php echo $row["Correo_Electronico"]; ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                <label>Telefóno #1</label>
                                <input placeholder="" type="text" class="form-control" id="txtTelefono1" name="txtTelefono1" value="<?php echo $row["Telefono1"]; ?>">
                            </div>

                            <div class="col-3">
                                <label>Telefóno #2</label>
                                <input placeholder="" type="text" class="form-control" id="txtTelefono2" name="txtTelefono2" value="<?php echo $row["Telefono1"]; ?>">
                            </div>
                            <div class="col-6">
                                <label>Dirección</label>
                                <input placeholder="Dirección" type="text" class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $row["Direccion"]; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label>Producto que ofrece</label>
                                <input placeholder="Producto" type="text" class="form-control" id="txtProducto" name="txtProducto" value="<?php echo $row["Producto"]; ?>">
                            </div>
                            <div class="col-6">
                                <label>Precio de costo</label>
                                <input placeholder="Precio de costo" type="text" class="form-control" id="txtPrecioProducto" name="txtPrecioProducto" value="<?php echo $row["Precio"]; ?>">
                            </div>
                        </div>

                    <br />
                    <br />
                    <br />


                    <div class="row">

<div class="col-6">
  <br/>
  <input type="submit" class="btn btn-success btn-block" id="btnActualizar" name="btnActualizar" value="Actualizar" />
</div>

<div class="col-6">
  <br/>
  <input type="submit" class="btn btn-success btn-block" id="btnEliminar" name="btnEliminar" value="Eliminar" />
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
    </form>
</body>