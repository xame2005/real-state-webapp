<?php

require "../../includes/funciones.php";
$auth = isAuthenticated();

if (!$auth) {
    header("Location: /");
}
//Validar la URL por ID válido
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: /admin");
}

//Base de Datos
require "../../includes/config/database.php";
$db = conectarDB();

//Obtener datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($resultado);

//Consultar la BD para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Arreglo con mensajes de error
$errores = [];

$titulo = $propiedad["titulo"];
$precio = $propiedad["precio"];
$descripcion = $propiedad["descripcion"];
$habitaciones = $propiedad["habitaciones"];
$wc = $propiedad["wc"];
$estacionamiento = $propiedad["estacionamiento"];
$vendedorId = $propiedad["vendedorId"];
$imagenPropiedad = $propiedad["imagen"];

//Ejecutar el código después de que el usuario llena el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $titulo = mysqli_real_escape_string($db, $_POST["titulo"]);
    $precio = mysqli_real_escape_string($db, $_POST["precio"]);
    $descripcion = mysqli_real_escape_string($db, $_POST["descripcion"]);
    $habitaciones = mysqli_real_escape_string($db, $_POST["habitaciones"]);
    $wc = mysqli_real_escape_string($db, $_POST["wc"]);
    $estacionamiento = mysqli_real_escape_string($db, $_POST["estacionamiento"]);
    $vendedorId = mysqli_real_escape_string($db, $_POST["vendedorId"]);
    $creado = date("Y/m/d");

    //Asignar files a una variable
    $imagen = $_FILES["imagen"];

    if (!$titulo) {
        $errores[] = "El campo título no puede estar vacío";
    }

    if (!$precio) {
        $errores[] = "El campo precio no puede estar vacío";
    }

    if (strlen($descripcion) < 60) {
        $errores[] = "El campo descripción debe contener al menos 60 caracteres";
    }

    if (!$habitaciones) {
        $errores[] = "El campo habitaciones no puede estar vacío";
    }
    if (!$wc) {
        $errores[] = "El campo wc no puede estar vacío";
    }
    if (!$estacionamiento) {
        $errores[] = "El campo estacionamiento no puede estar vacío";
    }

    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }

    //Validar el tamaño de la imagen (100kb Max)
    $medida = 1000 * 1000;

    if ($imagen["size"] > $medida) {
        $errores[] = "La imagen es muy pesada, el tamaño máximo es de 100 KB";
    }

    //Validar que el arreglo de errores esté vacío
    if (empty($errores)) {
        //Crear carpetas con ruta relativa
        $carpetaImagenes = "../../imagenes/";
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = "";

        //SUBIR ARCHIVOS
        if ($imagen["name"]) {
            unlink($carpetaImagenes . $propiedad["imagen"]);

            //Generar nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Subir la imagen
            move_uploaded_file($imagen["tmp_name"], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad["imagen"];
        }





        //Insertar en la base de datos
        $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header("Location: /admin?resultado=2");
        }
    }
}



incluirTemplate("header")
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título</label>
            <input name="titulo" type="text" id="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input name="precio" type="number" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input name="imagen" type="file" id="imagen" accept="image/jpeg, image/png">

            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?php echo $descripcion; ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Habitaciones</label>
            <input name="habitaciones" type="number" id="habitaciones" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños</label>
            <input name="wc" type="number" id="wc" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento</label>
            <input name="estacionamiento" type="number" id="estacionamiento" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="">--Seleccione un Vendedor--</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $row["id"] ? "selected" : ""; ?> value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"] . " " . $row["apellido"]; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate("footer") ?>