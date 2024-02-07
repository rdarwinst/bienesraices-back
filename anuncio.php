<?php 
    require 'includes/funciones.php';    
    incluirTemplate('header');

    

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /bienesraices/');
    }

    // Importar conexion
    require 'includes/config/database.php';
    $db = conectarDB();

    // Consulta Cosulta
    $query = "SELECT * FROM propiedades WHERE id = {$id}";

    // Obtener Resultados 
    $consulta = mysqli_query($db, $query);

    if(!$consulta->num_rows) {
        header('Location: /bienesraices/');
    }
    
    $propiedad = mysqli_fetch_assoc($consulta);

?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo']; ?></h1>

        <img src="/bienesraices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="Icono WC">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono Estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono Dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion']; ?></p>
        </div>
    </main>

<?php 
    mysqli_close($db);
    incluirTemplate('footer'); 
?>