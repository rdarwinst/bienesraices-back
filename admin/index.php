<?php

$resultado = $_GET['resultado'] ?? null;

require '../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Administrador de Biener Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Anuncio creado correctamente.</p>
    <?php endif; ?>
    <a href="./propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
</main>

<?php incluirTemplate('footer'); ?>