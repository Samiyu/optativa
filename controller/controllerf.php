<?php
require_once '../model/FacturaModel.php';
session_start();
$facturaModel = new FacturaModel();
$opc = $_REQUEST['opc'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
switch ($opc) {
    case "listarF":
        $listadof = $facturaModel->getFacturas();
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;

    case "crearF":
        header('Location: ../view/crearF.php');
        break;

    case "guardarF":
        $id = $_REQUEST['id'];
        $nombre= $_REQUEST['nombre'];
        $direccion= $_REQUEST['direccion'];
        $telefono= $_REQUEST['telefono'];
        $email= $_REQUEST['email'];

        try {
            $facturaModel->crearFactura($id, $nombre, $direccion,$telefono, $email);
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
        $listadof = $facturaModel->getFacturas();
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;
    
    case "cargarF":
        $id = $_REQUEST['id'];
        $factura = $facturaModel->getFacturas();
        $_SESSION['factura'] = $factura;
        header('Location: ../view/actualizarF.php');
        break;
    case "actualizarF":
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];
        $email = $_REQUEST['email'];
        $facturaModel->actualizarFactura($id, $nombre, $direccion,$telefono, $email);
        $listadof = $facturaModel->getFacturas();
        $_SESSION['listadofac'] = serialize($listadof);
        header('Location: ../facturas.php');
        break;
    default:
        header('Location: ../facturas.php');
}

