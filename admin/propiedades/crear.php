<?php
//Base de Datos
require "../../includes/config/database.php";
$db = conectarDB();

//Consultar la BD para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Arreglo con mensajes de error
$errores = [];

$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";

//Ejecutar el código después de que el usuario llena el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";

    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $habitaciones = $_POST["habitaciones"];
    $wc = $_POST["wc"];
    $estacionamiento = $_POST["estacionamiento"];
    $vendedorId = $_POST["vendedorId"];
    $creado = date("Y/m/d");

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

    //Validar que el arreglo de errores esté vacío
    if (empty($errores)) {
        //Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId');";
        var_dump($query);

        $resultado = mysqli_query($db, $query);
        var_dump($resultado);

        if ($resultado) {
            header("Location: /admin");
        }
    }
}


require "../../includes/funciones.php";

incluirTemplate("header")
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form action="" class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título</label>
            <input name="titulo" type="text" id="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input name="precio" type="number" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input name="imagen" type="file" id="precio" accept="image/jpeg, image/png" value="<?php echo $imagen; ?>">

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
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate("footer") ?>