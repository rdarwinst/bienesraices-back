<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header');
?>

    <main class="contenedor contenido-centrado">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.avif" type="image/avif">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg"
                        alt="Imagen de la entrada del blog">
                </picture>
            </div>
            <div class="entrada-contenido">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                    <p>Consejos para construir en el techo de tu casa, con los mejores materiales y ahorrando dinero.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.avif" type="image/avif">
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="build/img/blog2.jpg"
                        alt="Imagen de la entrada del blog">
                </picture>
            </div>
            <div class="entrada-contenido">
                <a href="entrada.html">
                    <h4>Guía para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                    <p>Maximisa el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle
                        vida a tu espacio</p>
                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.avif" type="image/avif">
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="build/img/blog3.jpg" alt="Imagen de la entrada del blog">
                </picture>
            </div>
            <div class="entrada-contenido">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                    <p>Consejos para construir en el techo de tu casa, con los mejores materiales y ahorrando dinero.</p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.avif" type="image/avif">
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.jpg" type="image/jpeg">
                    <img loading="lazy" width="200" height="300" src="build/img/blog4.jpg" alt="Imagen de la entrada del blog">
                </picture>
            </div>
            <div class="entrada-contenido">
                <a href="entrada.html">
                    <h4>Guía para la decoracion de tu hogar</h4>
                    <p>Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                    <p>Maximisa el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
                </a>
            </div>
        </article>
    </main>

<?php incluirTemplate('footer'); ?>