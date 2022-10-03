<?php
include '../../app/productController.php';
$producto = new ProductosController;

$objt = strip_tags($_GET['idEliminar']);

$productoEspecifico = $producto->delete($objt);
?>

<a href=""></a>