<?php

function validarUsuario()
{
    session_start();
    if (empty($_SESSION["Rol"])) {
        header('Location: index.php');
    }
}
