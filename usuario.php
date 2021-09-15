<?php
//Importar la conexión
require "includes/config/database.php";
$db = conectarDB();

//Crear un e-mail y un password
$email = "correo@correo.com";
$password = "123456";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

//Consulta a la base de datos
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '$passwordHash');";


//Agregar usuario a la base de datos
mysqli_query($db, $query);
