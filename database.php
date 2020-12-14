<?php

//mysql -h proyectoprogra4.mysql.database.azure.com -u proyectoprogra4@proyectoprogra4 -p

function abrirConexion()
{
    // $con = mysqli_init();
    // mysqli_real_connect($con, "proyectoprogra4.mysql.database.azure.com", "proyectoprogra4@proyectoprogra4", "!p1royectoprogra4", "proyectoprogra4", 3306);
    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $baseDatos = "proyectoprogra4";
    $con = new mysqli($servidor, $usuario, $password, $baseDatos) or die("Error: " . $con->error);
    return  $con;
}



function cerrarConexion($con)
{
    $con->close();
}
