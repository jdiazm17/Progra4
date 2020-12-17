<?php

include 'database.php';
$conexion = abrirConexion();
include 'validar-usuario.php';
validarUsuario();

if (isset($_GET['id'])) {
    $reserva = $_GET['id'];
    $sql = "call eliminarReserva('" . $reserva . "')";
    $resultado = $conexion->query($sql);
}

cerrarConexion($conexion);

?>