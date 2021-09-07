<?php
require "includes/funciones.php";

incluirTemplate("header")
?>

<main class="contenedor seccion">
  <h1>Contacto</h1>

  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
    <img loading="lazy" src="build/im/destacada3.jpg" alt="Imagen Contacto" />
  </picture>

  <h2>Llene el Fromulario de Contacto</h2>

  <form action="" class="formulario">
    <fieldset>
      <legend>Información Personal</legend>
      <label for="nombre">Nombre</label>
      <input type="text" placeholder="Tu Nombre" id="nombre" />

      <label for="email">Nombre</label>
      <input type="email" placeholder="Tu E-mail" id="email" />

      <label for="telefono">Telefono</label>
      <input type="tel" placeholder="Tu Teléfono" id="telefono" />

      <label for="mensaje">Mensaje</label>
      <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
    </fieldset>

    <fieldset>
      <legend>Información Sobre la Propiedad</legend>
      <label for="opciones">Vende o Compra:</label>
      <select name="" id="opciones">
        <option value="" disabled selected>--Seleccione--</option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
      </select>

      <label for="presupuesto">Presupuesto</label>
      <input type="number" placeholder="Tu Presupuesto" />
    </fieldset>

    <fieldset>
      <legend>Información Sobre Contacto</legend>

      <p>Cómo Desea Ser Contactado?</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Teléfono</label>
        <input name="contacto" type="radio" value="telefono" id="contactar-telefono" />

        <label for="contactar-email">E-Mail</label>

        <input name="contacto" type="radio" value="email" id="contactar-email" />
      </div>

      <p>
        Si eligió teléfono, elija la fecha y la hora para ser contactado
      </p>

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" />

      <label for="hora">Hora:</label>
      <input type="time" id="hora" min="09:00" max="18:00" />
    </fieldset>

    <input type="submit" value="Enviar" class="boton-verde" />
  </form>
</main>

<?php incluirTemplate("footer") ?>