<?php
require "includes/funciones.php";

incluirTemplate("header")
?>

<main class="contenedor seccion">
  <h1>Conoce Sobre Nosotros</h1>

  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp" />
        <source srcset="build/img/nosotros.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros" />
      </picture>
    </div>

    <div class="texto-nosotros">
      <blockquote>25 Años de Experiencia</blockquote>

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti
        libero dicta minus quibusdam incidunt eum, repellat pariatur!
        Recusandae assumenda culpa, ratione sint tempore repudiandae tenetur
        asperiores et consectetur temporibus vero! Magni officiis ratione
        inventore veritatis. Itaque quia illo magni reiciendis sit,
        asperiores, nobis autem error perferendis minima rerum architecto ut
        ad repellat consectetur tempora excepturi distinctio alias voluptas,
        corporis enim.
      </p>

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur
        voluptate possimus non optio odit illo exercitationem suscipit
        adipisci illum eaque nobis, alias voluptas aspernatur? Ab eos
        possimus at? Soluta, sed.
      </p>
    </div>
  </div>
</main>

<section class="contenedor seccion">
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
</section>

<?php incluirTemplate("footer") ?>