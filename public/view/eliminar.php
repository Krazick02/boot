<?php
include '../../app/AuthController.php';
include '../../app/productController.php';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            $producto = new ProductosController;
            $objt = strip_tags($_GET['idEliminar']);
            $productoEspecifico = $producto->delete($objt);
            break;
        case 'logout':
            $sesion = new AuthController;
            $salir = $sesion->logout();
            break;
    }
}
