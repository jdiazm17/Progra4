<?php

  $ID_Proveedor = $_GET['id_prov'];

  include 'database.php';
  $conexion = abrirConexion();
  
  if(isset($_POST['btnActualizar']))
  {
	//Actualizar
	echo "";
  }
  
  if(isset($_POST['btnEliminar']))
  {
	//Eliminar
	header('Location: ejercicio.php');
  }

  $Proveedores = "call consultarProveedores ('" .$ID_Proveedor . "')";
  $ListaProveedores = $conexion -> query($Proveedores);
  $Registro = mysqli_fetch_array($ListaProveedores);

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

                <div class="row">

<div class="col-4">
  <label>ID_Proveedor</label>
  <input type="text" class="form-control" id="txtIDProveedor" name="txtIDProveedor" readonly="true"
  value="<?php if(!empty($ID_Proveedor)){ echo $ID_Proveedor; } ?>" />
</div>

<div class="col-4">
  <label>Código</label>
  <input type="text" class="form-control" id="txtCodigo" name="txtCodigo"
  value="<?php echo $Registro["Codigo"]; ?>" />
</div>

 <div class="col-4">
  <label>Nombre</label>
  <input type="text" class="form-control" id="txtNombre" name="txtNombre"
  value="<?php echo $Registro["Nombre_Proveedor"]; ?>" />
</div>

<div class="col-4">
  <label>Código</label>
  <input type="text" class="form-control" id="txtCodigo" name="txtCodigo"
  value="<?php echo $Registro["Codigo"]; ?>" />
</div>

<div class="col-4">
  <label>Categoria</label>
  <input type="text" class="form-control" id="txtCategoria" name="txtCategoria"
  value="<?php echo $Registro["Categoria_Proveedor"]; ?>" />
</div>

<div class="col-4">
  <label>Unidad</label>
  <input type="text" class="form-control" id="txtUnidad" name="txtUnidad"
  value="<?php echo $Registro["Unidad"]; ?>" />
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
</body>