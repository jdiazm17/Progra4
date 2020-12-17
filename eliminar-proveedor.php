<?php

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if (isset($_GET['id'])) {
    $proveedor = $_GET['id'];
    $sql = "call EliminarProveedor('" . $proveedor . "')";
    $resultado = $conexion->query($sql);
}

cerrarConexion($conexion);

?>