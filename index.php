<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header', true);
?>

    <main class="contenedor">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Apartamentos en Venta</h2>

        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.avif" type="image/avif">
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/anuncio1.jpg" alt="Anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo con un excelente precio</p>
                    <p class="precio">$157.469.999</p>
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
                    <a class="boton boton-amarillo-block" href="anuncio.html">Ver Propiedad</a>
                </div> <!-- .contenido-anuncio -->
            </div><!-- .anuncio -->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.avif" type="image/avif">
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/anuncio2.jpg" alt="Anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa terminada de lujo</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo con un excelente precio</p>
                    <p class="precio">$157.469.999</p>
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
                    <a class="boton boton-amarillo-block" href="anuncio.html">Ver Propiedad</a>
                </div> <!-- .contenido-anuncio -->
            </div><!-- .anuncio -->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.avif" type="image/avif">
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <img loading="lazy" width="200" height="300" src="build/img/anuncio3.jpg" alt="Anuncio">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con piscina</h3>
                    <p>Casa en el lago con excelente vista, acabados de lujo con un excelente precio</p>
                    <p class="precio">$157.469.999</p>
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
                    <a class="boton boton-amarillo-block" href="anuncio.html">Ver Propiedad</a>
                </div> <!-- .contenido-anuncio -->
            </div><!-- .anuncio -->
        </div><!-- .contenedor-anuncios -->
        <div class="alinear-derecha">
            <a class="boton boton-verde" href="anuncios.html">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor te contactara en el menor tiempo posible</p>
        <a href="contacto.html" class="boton boton-amarillo">Contactar</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

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
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                        <p>Consejos para construir en el techo de tu casa, con los mejores materiales y ahorrando
                            dinero.</p>
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
                        <p class="informacion-meta">Escrito el: <span>20/10/2023</span> Por: <span>Admin</span></p>
                        <p>Maximisa el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para
                            darle vida a tu espacio</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron
                    cumple con todas mis espectativas.
                </blockquote>
                <p>- Darwin Ramirez</p>
            </div>
        </section>
    </div>

<?php incluirTemplate('footer'); ?>