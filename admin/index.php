<?php
//Importar la conexión a la base de datos
require "../includes/config/database.php";
$db = conectarDB();

//Realizar el query
$query = "SELECT * FROM propiedades";

//Consultar la base de datos
$resultadoConsulta = mysqli_query($db, $query);

//Muestra la alerta condicional
$resultado = $_GET["resultado"] ?? null;

//Inyectar Template de funciones
require "../includes/funciones.php";

incluirTemplate("header")
?>

<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>

    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php endif ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>


                <tr>
                    <td><?php echo $propiedad["id"]; ?></td>
                    <td><?php echo $propiedad["titulo"]; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad["imagen"]; ?>" alt="Imagen propiedad" class="imagen-tabla"></td>
                    <td>$<?php echo $propiedad["precio"]; ?></td>
                    <td><a class="boton-rojo-block" href="#">Eliminar</a><a class="boton-amarillo-block" href="#">Actualizar</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

<?php
//Cerrar conexión con la base de datos
mysqli_close($db);
?>

<?php incluirTemplate("footer") ?>