<?php

include 'database.php';
$conexion = abrirConexion();



if (isset($_GET['buscar'])) {
    $productoBuscado = "";
    $producto = $_GET['buscar'];
    $sql = "call busquedaProducto('" . $producto . "')";
    $resultado = $conexion->query($sql);
    $productoBuscado = '<div class="collection">';
    if ($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultado)) {
            $productoBuscado .= '<a href="#" class="collection-item">' . $row["NOMBRE"] . " - " . $row["PRECIO_FINAL"] . '</a>';
        }
    } else {
        $productoBuscado .= '<li>Producto no encontrado</li>';
    }

    $productoBuscado .= '</div>';
  //  $precioProducto .= '</span>';
    echo $productoBuscado;
}

cerrarConexion($conexion);
