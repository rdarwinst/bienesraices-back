<?php
require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

validarLogin();

$db = conectarDB();

// Consultar el listado de los vendedores, desde la BD
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_id = '';


if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST);

    // Generar un nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la Imagen
    // Realiza un Resize a la imagen con Intervention
    $manager = new Image(Driver::class);
    if ($_FILES['imagen']['tmp_name']) {
        $image = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validar 
    $errores = $propiedad->validarForm();

    if (empty($errores)) {        

        //Crear una carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la BD
        $resultado = $propiedad->guardar();

        // Mensaje de exito o error
        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=1');
        }
    } else {
        $titulo = $propiedad->titulo;
        $precio = $propiedad->precio;
        $descripcion = $propiedad->descripcion;
        $habitaciones = $propiedad->habitaciones;
        $wc = $propiedad->wc;
        $estacionamiento = $propiedad->estacionamiento;
        $vendedores_id = $propiedad->vendedores_id;
    }
}

incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Crear Propiedad</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form action="./crear.php" class="formulario" method="post" autocomplete="off" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo </label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de la propiedad." value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" placeholder="Precio de tu propiedad." value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Información de la Propiedad</legend>

            <label for="habitaciones">Cantidad de Habitaciones</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Cantidad de Baños</label>
            <input type="number" name="wc" id="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Cantidad de Estacionamientos</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedores_id" id="vendedor">
                <option value="">-- Seleccionar --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>