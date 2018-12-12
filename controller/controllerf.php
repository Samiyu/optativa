<?php


require_once '../model/FacturaModel.php';
session_start();
$facturaModel = new FacturaModel();
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
switch ($opcion) {
    case "listarF":
        $listadof = $facturaModel->getFacturas($ordenf);
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;

    case "crearF":
        header('Location: ../view/crearF.php');
        break;

    case "guardarF":
        $id = $_REQUEST['id'];
        $ref_factura= $_REQUEST['ref_fac'];
        $ref_producto= $_REQUEST['ref_prod'];
        $cantidad= $_REQUEST['cantidad'];
        $precio= $_REQUEST['precio'];
        $subtotal= $_REQUEST['subtotal'];

        try {
            $facturaModel->crearFactura($id, $ref_factura, $ref_producto, $cantidad, $precio, $subtotal);
        } catch (Exception $e) {
            $_SESSION['mensaje'] = $e->getMessage();
            header('Location: ../facturas.php');
        }
        $listadof = $facturaModel->getFacturas();
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;

    case "eliminarF":
        $id = $_REQUEST['id'];

        $facturaModel->eliminarFactura($id);

        $listadof = $clienteModel->getClientes(true);
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;
    case "cargarF":
        $id = $_REQUEST['id'];
        $factura = $facturaModel->getFacturas($orden);
        $_SESSION['factura'] = $factura;
        header('Location: ../view/actualizarF.php');
        break;
    default:
//si no existe la opcion recibida por el controlador, siempre
//redirigimos la navegacion a la pagina index:
        header('Location: ../facturas.php');
}

