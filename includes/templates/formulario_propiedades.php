<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo </label>
    <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad." value="<?php echo sanitizarHTML($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" name="precio" id="precio" placeholder="Precio de tu propiedad." value="<?php echo sanitizarHTML($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion"><?php echo sanitizarHTML($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Información de la Propiedad</legend>

    <label for="habitaciones">Cantidad de Habitaciones</label>
    <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->habitaciones); ?>">

    <label for="wc">Cantidad de Baños</label>
    <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->wc); ?>">

    <label for="estacionamiento">Cantidad de Estacionamientos</label>
    <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitizarHTML($propiedad->estacionamiento); ?>">
</fieldset>
<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id" id="vendedor">
        
    </select>
</fieldset>