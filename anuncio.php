<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>

        <picture>
            <source srcset="build/img/destacada.avif" type="image/avif">
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="build/img/destacada.jpg" alt="Imagen de la Propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$257.599.876</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p>4</p>
                </li>
            </ul>
            <p>Nisi occaecat aliqua officia anim et tempor mollit. Lorem dolore fugiat occaecat laboris sint ipsum sint consectetur ea. Do officia irure ex non consectetur ex enim magna do anim non. Et consequat veniam ad mollit exercitation enim. Ullamco fugiat cillum exercitation aute anim aliqua dolore aute velit ipsum pariatur cillum. 
            Sit deserunt tempor adipisicing fugiat mollit elit quis fugiat eu est enim. Culpa est elit duis duis eu ut et est dolor nulla. Pariatur aliqua proident qui sint enim.</p>
            <p>Ullamco duis excepteur ea deserunt sunt qui aliquip. Officia ad nulla non et irure dolor amet cupidatat. Pariatur mollit quis incididunt Lorem. Proident et ex dolore mollit. Excepteur Lorem dolor proident nisi deserunt eiusmod fugiat aute aute pariatur. Sit laborum magna enim non enim id sit duis nisi laborum dolore. Ex exercitation labore dolore cillum nostrud nulla magna excepteur sunt voluptate.</p>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>