<?php

include 'database.php';
$conexion = abrirConexion();

if (isset($_GET['id'])) {
    $producto = $_GET['id'];
    $sql = "call eliminarProducto('" . $producto . "')";
    $resultado = $conexion->query($sql);
}

cerrarConexion($conexion);

?>