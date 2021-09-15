<?php
//Importar la conexión a la base de datos
require "includes/config/database.php";
$db = conectarDB();

//Autenticar el usuario
$errores = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = mysqli_real_escape_string($db, filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST["password"]);

    if (!$email) {
        $errores[] = "El correo es obligatorio o no tiene un formato válido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE  email = '${email}' ";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
            //Revisar si el password coincide
            $usuario = mysqli_fetch_assoc($resultado);

            //Verificar si el password coincide
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                //Usuario autenticado
                session_start();

                //Llenar el arreglo de la sesión
                $_SESSION["usuario"] = $usuario["email"];
                $_SESSION["login"] = true;

                header("Location: /admin");
            } else {
                $errores[] = "La contraseña es incorrecta";
            }
            var_dump($auth);
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

//Template para incluir el Header
require "includes/funciones.php";
incluirTemplate("header")
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-Mail</label>
            <input type="email" name="email" placeholder="Tu E-mail" id="email" required />

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu Password" id="password" required />

        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate("footer") ?>