<?php
$id = $_GET["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
var_dump($id);

if (!$id) {
  header("Location: /");
}
//Importar la conexión
require "includes/config/database.php";
$db = conectarDB();

//Realizar el query
$query = "SELECT * FROM propiedades WHERE id = ${id}";

//Obtener el resultado
$resultado = mysqli_query($db, $query);
var_dump($resultado);
if ($resultado->num_rows === 0) {
  header("Location: /");
}
$propiedad = mysqli_fetch_assoc($resultado);

require "includes/funciones.php";
incluirTemplate("header")
?>


<main class="contenedor seccion contenido-centrado">
  <h1><?php echo $propiedad["titulo"]; ?></h1>

  <img loading="lazy" src="/imagenes/<?php echo $propiedad["imagen"]; ?>" alt="Imagen Destacada" />

  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad["precio"]; ?></p>

    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" />
        <p><?php echo $propiedad["wc"]; ?></p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" />
        <p><?php echo $propiedad["estacionamiento"]; ?></p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" />
        <p><?php echo $propiedad["habitaciones"]; ?></p>
      </li>
    </ul>

    <p><?php echo $propiedad["descripcion"]; ?></p>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis
      rerum suscipit dignissimos soluta numquam perspiciatis cumque ab sunt
      distinctio reprehenderit, nisi, molestiae quo earum ex minima totam!
      At, illo modi!
    </p>
  </div>
</main>

<?php
//Cerrar la conexión
mysqli_close($db);
incluirTemplate("footer")
?>