<?php 
    require 'includes/app.php';    
    incluirTemplate('header');
?>

    <main class="contenedor contacto">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.avif" type="image/avif">
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>

        <h2>Llena el formulario de contacto</h2>

        <form action="#" class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre.">

                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Escribe tu email.">

                <label for="telefono">Telefono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Escribe tu telefono.">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información de la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select name="opciones" id="opciones">
                    <option value="" selected disabled>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="Ingresa tu presupuesto.">
            </fieldset>

            <fieldset>
                <legend>Información de Contacto</legend>

                <p>¿Cómo deseas ser contactado?</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="contacto" id="contactar-telefono">
                    <label for="contactar-email">E-mail</label>
                    <input type="radio" name="contacto" id="contactar-email">
                </div>

                <p>Si elegiste telefono, ingresa la fecha y hora.</p>
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" id="hora" min="09:00" max="17:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>
    </main>

<?php incluirTemplate('footer'); ?>