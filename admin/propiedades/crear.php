<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

$propiedad = new Propiedad();

// Consulta para obtener todos los vendedores

$vendedores = Vendedor::all();

$errores = Propiedad::getErrores();

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    // Generar un nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la Imagen
    // Realiza un Resize a la imagen con Intervention
    $manager = new Image(Driver::class);
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validar 
    $errores = $propiedad->validarForm();

    // debuguear($propiedad);

    if (empty($errores)) {

        //Crear una carpeta
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la BD
        $propiedad->guardar();

    }
}

validarLogin();
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

    <form action="./crear.php" class="formulario" method="post" autocomplete="on" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>