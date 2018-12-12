<?php


require_once '../model/FacturaModel.php';
session_start();
$facturaModel = new FacturaModel();
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
switch ($opcion) {
    case "listarF":

        $listado = $facturaModel->getFacturas(true);
        $_SESSION['listadofac'] = serialize($listado);
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
        $listado = $facturaModel->getFacturas();
        $_SESSION['listadofac'] = serialize($listado);
        header('Location: ../facturas.php');
        break;

    case "eliminarF":
        $id = $_REQUEST['id'];

        $facturaModel->eliminarFactura($id);

        $listado = $clienteModel->getClientes(true);
        $_SESSION['listadofac'] = serialize($listado);
        header('Location: ../facturas.php');
        break;
    case "cargarF":
        $id = $_REQUEST['id'];
        $factura = $facturaModel->getFacturas($orden);
        $_SESSION['factura'] = $factura;
        header('Location: ../view/actualizarF.php');
        break;
    case "actualizarF":
        $id = $_REQUEST['id'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];

        $clienteModel->actualizarCliente($id, $cedula, $nombres, $apellidos);

        $listadoC = $clienteModel->getClientes();
        $_SESSION['listadoC'] = serialize($listado);
        header('Location: ../clientes.php');
        break;
}

