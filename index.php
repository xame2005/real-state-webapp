<?php
require "includes/funciones.php";


incluirTemplate("header", $inicio = true)
?>

<main class="contenedor seccion">
  <h1>Más Sobre Nosotros</h1>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="imagen seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque
        eius placeat illum, praesentium unde delectus optio similique odit
        tenetur perspiciatis. Ipsa ratione earum pariatur enim animi nam
        aspernatur voluptatum.
      </p>
    </div>

    <div class="icono">
      <img src="build/img/icono2.svg" alt="imagen precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque
        eius placeat illum, praesentium unde delectus optio similique odit
        tenetur perspiciatis. Ipsa ratione earum pariatur enim animi nam
        aspernatur voluptatum.
      </p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="imagen tiempo" loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit atque
        eius placeat illum, praesentium unde delectus optio similique odit
        tenetur perspiciatis. Ipsa ratione earum pariatur enim animi nam
        aspernatur voluptatum.
      </p>
    </div>
  </div>
</main>

<section class="seccion contenedor">
  <h2>Casas y Departamentos en Venta</h2>

  <?php
  $limite = 3;
  include "includes/templates/anuncios.php"
  ?>

  <div class="alinear-derecha">
    <a href="anuncios.php" class="boton-verde">Ver Todas</a>
  </div>
</section>

<section class="imagen-contacto">
  <h2>Encuentra la Casa Adecuada para Tí</h2>
  <p>Llena el formulario y pronto nos pondrémos en contácto contigo.</p>
  <a href="contacto.php" class="boton-amarillo-inline">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
  <section class="blog">
    <h3>Nuestro Blog</h3>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog1.webp" type="image/webp" />
          <source srcset="build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Terraza en el Techo de tu Casa</h4>
          <p class="informacion-meta">
            Escrito el: <span>29/08/2021</span> por: <span>Admin</span>
          </p>
          <p>
            Consejos para construir un aterraza en el techo de tu casa con
            los mejores materiales y ahorrando dinero
          </p>
        </a>
      </div>
    </article>

    <article class="entrada-blog">
      <div class="imagen">
        <picture>
          <source srcset="build/img/blog2.webp" type="image/webp" />
          <source srcset="build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog" />
        </picture>
      </div>

      <div class="texto-entrada">
        <a href="entrada.php">
          <h4>Guia para la decoración de tu hogar</h4>
          <p class="informacion-meta">
            Escrito el: <span>29/08/2021</span> por: <span>Admin</span>
          </p>
          <p>
            Maximiza el espacio en tu hogar con esta guía, aprende a
            combinar muebles y colores para darle vida a tu espacio.
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimoniales">
    <h3>Testimoniales</h3>
    <div class="testimonial">
      <blockquote>
        El personal se comportó de una excelente forma, muy buena atención y
        la casa que me ofrecieron cumple por completo mis expectativas.
      </blockquote>
      <p>- Samuel Gonzalez</p>
    </div>
  </section>
</div>

<?php incluirTemplate("footer") ?>