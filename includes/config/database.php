<?php

function conectarDB(): mysqli
{
    $db = mysqli_connect("localhost", "root", "", "bienes_raices");
    $db->set_charset('utf8');

    if (!$db) {
        echo "Error al conectar a la base de datos";
        exit;
    }

    return $db;
}
