<?php

use App\Propiedad;

require '../../includes/app.php';

// Validar url por id valido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /bienesraices/admin');
}
// Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

// Consultar el listado de los vendedores, desde la BD

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    
    $args = $_POST['propiedad'];

    $propiedad -> sincronizar($args);

    debuguear($propiedad);



    // Asignar files a una imagen 

    $imagen = $_FILES['imagen'];


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo.";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio.";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres.";
    }
    if (!$habitaciones) {
        $errores[] = "Debes añadir el número de habitaciones.";
    }
    if (!$wc) {
        $errores[] = "El número de baños es obligatorio.";
    }
    if (!$estacionamiento) {
        $errores[] = "Debes añadir la cantidad de estacionamientos de la propiedad.";
    }
    if (!$vendedores_id) {
        $errores[] = "Debes elegir un vendedor.";
    }

    // Validar por peso 5MB

    $medida = 1024 * 5120;
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada.";
    }

    if (empty($errores)) {

        // Subida de imagenes en PHP

        //Crear una carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        if ($imagen['name']) {

            // Eliminar imagen anterior
            unlink($carpetaImagenes . $propiedad['imagen']);

            // Generar un nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            // Subir la imagen a la carpeta

            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Isertar en la base de datos

        } else {
            $nombreImagen = $propiedad['imagen'];
        }

        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion =  '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedores_id} WHERE id = {$id}";

        // echo $query;




        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: /bienesraices/admin?resultado=2');
        }
    }
}
validarLogin();
incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Actualizar una Propiedad</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="formulario" method="post" autocomplete="off" enctype="multipart/form-data">
        <?php include('../../includes/templates/formulario_propiedades.php'); ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>