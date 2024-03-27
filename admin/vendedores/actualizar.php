<?php 

require '../../includes/app.php';
use App\Vendedor;
validarLogin();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /bienesraices/admin/');
}

$vendedor = Vendedor::find($id);

// debuguear($vendedor);


$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['vendedor'];
    $vendedor -> sincronizar($args);

    $errores = $vendedor -> validarForm();

    if(empty($errores)) {
        $vendedor -> guardar();
    }

}

incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Actualizar Vendedor</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="formulario" id="form-vendedor" method="post" autocomplete="on">

        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>
