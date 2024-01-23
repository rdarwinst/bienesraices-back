<?php 

    require '../../includes/config/database.php';

    $db = conectarDB();

    require '../../includes/funciones.php';    
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Crear Propiedad</h1>
        <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>
        <form action="#" class="formulario">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo </label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad.">

                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" placeholder="Precio de tu propiedad.">
                <label for="imagen">Imagen</label>                
                <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información de la Propiedad</legend>
                <label for="habitaciones">Cantidad de Habitaciones</label>
                <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9">
                <label for="wc">Cantidad de Baños</label>
                <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9">
                <label for="estacionamiento">Cantidad de Estacionamientos</label>
                <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9">
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedor" id="vendedor">
                    <option value="" disabled selected>-- Seleccionar --</option>
                    <option value="1">Darwin</option>
                    <option value="2">Keren</option>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php incluirTemplate('footer'); ?>