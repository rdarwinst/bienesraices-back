<?php 
    require 'includes/app.php';    
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Anuncios</h1>

        <?php
            include 'includes/templates/anuncios.php';
        ?>
    </main>

<?php incluirTemplate('footer'); ?>