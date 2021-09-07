<?php
require "includes/funciones.php";

incluirTemplate("header")
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Guía para la Decoración de tu Hogar</h1>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen Destacada2" />
  </picture>

  <p class="informacion-meta">
    Escrito el: <span>29/08/2021</span> por: <span>Admin</span>
  </p>

  <div class="resumen-propiedad">
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