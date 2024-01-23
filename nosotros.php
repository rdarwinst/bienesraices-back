<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header');
?>

    <main class="contenedor">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.avif" type="image/avif">
                    <source srcset="buiild/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="build/img/nosotros.jpg" alt="Imagen Nosotros">
                </picture>                
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Commodo in ad dolor officia excepteur occaecat sint qui aute reprehenderit non. Eu quis eu duis in Lorem sunt amet occaecat nostrud eiusmod sunt officia. Cupidatat magna duis eu esse nisi laborum consectetur. Id cillum esse incididunt nulla culpa nostrud nulla sit proident ad cupidatat non ea.Nulla incididunt eu sunt irure. Sint eu cillum ex irure Lorem non officia Lorem ipsum sint sit. Excepteur deserunt occaecat reprehenderit et do amet. Amet sunt cupidatat officia mollit. Et qui duis ad eiusmod ut nostrud nostrud qui proident.</p>
                <p>Sit sunt quis aute irure cillum est culpa nostrud. Pariatur aliquip do eiusmod ipsum. Duis nostrud proident qui ad. Laboris commodo proident adipisicing Lorem reprehenderit exercitation quis. Non amet id est et ea minim reprehenderit magna do ipsum officia. Commodo proident ut non culpa ullamco ullamco Lorem laboris in quis adipisicing laborum est. Labore eiusmod eu voluptate esse ad labore incididunt mollit irure officia aliqua duis labore.</p>
            </div>
        </div>
    </main>

    <section class="contenedor">
        <h2>Más Sobre Nosotros</h2>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Nostrud esse occaecat nulla in voluptate id occaecat minim magna incididunt minim ullamco. Incididunt
                    est in culpa eu ad excepteur eiusmod minim veniam dolor do laboris eu enim.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Nostrud esse occaecat nulla in voluptate id occaecat minim magna incididunt minim ullamco. Incididunt
                    est in culpa eu ad excepteur eiusmod minim veniam dolor do laboris eu enim.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Nostrud esse occaecat nulla in voluptate id occaecat minim magna incididunt minim ullamco. Incididunt
                    est in culpa eu ad excepteur eiusmod minim veniam dolor do laboris eu enim.</p>
            </div>
        </div>
    </section>

<?php incluirTemplate('footer'); ?>