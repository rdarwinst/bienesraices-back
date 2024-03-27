<?php 

require '../../includes/app.php';
use App\Vendedor;
validarLogin();

$vendedor = new Vendedor();
// debuguear($vendedor);

$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vendedor = new Vendedor($_POST['vendedor']);

    $errores = $vendedor -> validarForm();

    if(empty($errores)) {
        $vendedor -> guardar();
    }

}

incluirTemplate('header');
?>

<main class="contenedor">
    <h1>Registrar Nuevo Vendedor</h1>
    <a href="/bienesraices/admin" class="boton boton-verde">Regresar</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form action="./crear.php" class="formulario" id="form-vendedor" method="post" autocomplete="on">

        <?php include '../../includes/templates/formulario_vendedores.php'; ?>

        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>

</main>

<?php incluirTemplate('footer'); ?>
