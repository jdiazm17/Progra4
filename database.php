<?php

//mysql -h proyectoprogra4.mysql.database.azure.com -u proyectoprogra4@proyectoprogra4 -p

function abrirConexion()
{
    $con = mysqli_init();
    mysqli_real_connect($con, "proyectoprogra4.mysql.database.azure.com", "proyectoprogra4@proyectoprogra4", "!p1royectoprogra4", "proyectoprogra4", 3306);
    if (mysqli_connect_errno($con)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    } else {
        die('Conectada');
    }
    return $con;
}



function cerrarConexion($con)
{
    $con->close();
}
