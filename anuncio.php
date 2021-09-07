<?php
require "includes/funciones.php";
incluirTemplate("header")
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Casa en Venta frente al Bosque</h1>

  <picture>
    <source srcset="build/img/destacada.webp" type="image/webp" />
    <source srcset="build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen Destacada" />
  </picture>

  <div class="resumen-propiedad">
    <p class="precio">$2,500,000</p>

    <ul class="iconos-caracteristicas">
      <li>
        <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC" />
        <p>3</p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento" />
        <p>3</p>
      </li>

      <li>
        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio" />
        <p>4</p>
      </li>
    </ul>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique
      consequuntur nihil, aspernatur dolore alias mollitia vitae numquam a
      ut deleniti soluta temporibus quis magnam necessitatibus eos at ipsum
      nam iste? Ipsa illo vero at? Modi non nobis expedita. Tempore
      veritatis illum asperiores temporibus minima? Optio, hic cupiditate.
      Eligendi repellendus rem voluptatibus quaerat, deserunt cum
      exercitationem sequi porro ea rerum quam!
    </p>

    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis
      rerum suscipit dignissimos soluta numquam perspiciatis cumque ab sunt
      distinctio reprehenderit, nisi, molestiae quo earum ex minima totam!
      At, illo modi!
    </p>
  </div>
</main>

<?php incluirTemplate("footer") ?>