<?php

include 'database.php';
$conexion = abrirConexion();

if (isset($_GET['id'])) {
    $cliente = $_GET['id'];
    $sql = "call eliminarCliente('" . $cliente . "')";
    $resultado = $conexion->query($sql);
}

cerrarConexion($conexion);

?>