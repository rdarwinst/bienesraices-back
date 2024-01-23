<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.avif" type="image/avif">
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada2.jpg" alt="Imagen de la Propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>12/01/2023</span> Por: <span>rdarwinst</span></p>

        <div class="resumen-propiedad">
            <p>Nisi occaecat aliqua officia anim et tempor mollit. Lorem dolore fugiat occaecat laboris sint ipsum sint
                consectetur ea. Do officia irure ex non consectetur ex enim magna do anim non. Et consequat veniam ad
                mollit exercitation enim. Ullamco fugiat cillum exercitation aute anim aliqua dolore aute velit ipsum
                pariatur cillum.
                Sit deserunt tempor adipisicing fugiat mollit elit quis fugiat eu est enim. Culpa est elit duis duis eu
                ut et est dolor nulla. Pariatur aliqua proident qui sint enim.</p>
            <p>Ullamco duis excepteur ea deserunt sunt qui aliquip. Officia ad nulla non et irure dolor amet cupidatat.
                Pariatur mollit quis incididunt Lorem. Proident et ex dolore mollit. Excepteur Lorem dolor proident nisi
                deserunt eiusmod fugiat aute aute pariatur. Sit laborum magna enim non enim id sit duis nisi laborum
                dolore. Ex exercitation labore dolore cillum nostrud nulla magna excepteur sunt voluptate.</p>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>