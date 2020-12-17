<?php

session_start();

if (isset($_POST['btnIngresar'])) {
	include 'database.php';
	$conexion = abrirConexion();

	$txtUsuario = $_POST['txtUsuario'];
	$txtClave = $_POST['txtClave'];
	$Usuario = "call Ingreso('$txtUsuario', '$txtClave')";
	$ListaPromedios = $conexion->query($Usuario);
	$Registro = mysqli_fetch_array($ListaPromedios);

	if (empty($Registro)) {
		echo "Usuario no registrado en el sistema";
	} else {
		$_SESSION["Nombre"] = $Registro['Nombre'];
		$_SESSION["Usuario"] = $Registro['Usuario'];
		$_SESSION["Clave"] = $Registro['Clave'];
		$_SESSION["Rol"] = $Registro['Rol'];
		if ($Registro['Rol'] == 'Administrador') {
			header('refresh:1;url=menu-principal.php');
		} else {
			header('refresh:1;url=menu-principal.php');
		}
	}

	cerrarConexion($conexion);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>

<body>
	<form action="" method="post" onsubmit="return ValidarDatos();" id="login">

		<div class="d-flex" id="wrapper">
			<div id="page-content-wrapper">
				<div class="container-fluid">
					<div class="card-body">
						<br />
						<br />
						<h2>
							Kozko
						</h2>
						<br />
						<br />
						<br />
						<div class="row justify-content-center align-items-center">
							<div class="col-4">
								<label>Usuario</label>
								<input type="text" class="form-control" id="txtUsuario" name="txtUsuario" />
							</div>
						</div>
						<br />
						<div class="row justify-content-center align-items-center">
							<div class="col-4">
								<label>Clave</label>
								<input type="password" class="form-control" id="txtClave" name="txtClave" />
							</div>
						</div>
						<br />
						<div class="row justify-content-center align-items-center center-align">
							<div class="col-6">
								<br />
								<input type="submit" autocomplete="off" class="btn waves-effect waves-light blue accent-4" id="btnIngresar" name="btnIngresar" value="Ingresar" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>
			function ValidarDatos() {
				localStorage.setItem('XXXXXX', $("#txtClave").val());
				//alert(localStorage.getItem('NombrePersona'));
				//localStorage.removeItem('NombrePersona');
				//localStorage.clear();
				true;
			}
		</script>
		<script src="js/validarUsuario.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	</form>
</body>

</html>