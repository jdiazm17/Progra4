<?php

include 'database.php';
$conexion = abrirConexion();

echo "<script>alert('Successfully booked for a vehicle, email has be')</script>";

if (isset($_GET['buscar'])) {
    $productoBuscado = "";
    $producto = $_GET['buscar'];
    $sql = "call busquedaProducto('" . $producto . "')";
    $resultado = $conexion->query($sql);
    $productoBuscado = '<ul class="list-unstyled">';
    if ($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultado)) {
            $productoBuscado .= '<li>' . $row["NOMBRE"] . '</li>';
        }
    } else {
        $productoBuscado .= '<li>Producto no encontrado</li>';
    }

    $productoBuscado .= '</ul>';
    echo $productoBuscado;
}

cerrarConexion($conexion);
?>