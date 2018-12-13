<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../model/ClienteModel.php';
session_start();
$clienteModel = new ClienteModel();
$op = $_REQUEST['op'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaj']);
switch ($op) {
    case "listarC":
//obtenemos la lista de productos:
        $listadoC = $clienteModel->getClientes();
//y los guardamos en sesion:
        $_SESSION['listadoclis'] = serialize($listadoC);
        //obtenemos el valor total de productos y guardamos en sesion:
        header('Location: ../clientes.php');
        break;

    case "crearC":
        header('Location: ../view/crearC.php');
        break;
    case "guardarC":
        $id = $_REQUEST['id'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        try {
            $clienteModel->crearCliente($id, $cedula, $nombres, $apellidos);
        } catch (Exception $e) {
            $_SESSION['mensaj'] = $e->getMessage();
            header('Location: ../clientes.php');
        }
        $listadoC = $clienteModel->getClientes();
        $_SESSION['listadoclis'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;

    case "eliminarC":
        $id = $_REQUEST['id'];
        $clienteModel->eliminarCliente($id);
        $listadoC = $clienteModel->getClientes();
        $_SESSION['listadoclis'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;
    case "cargarC":
        $id = $_REQUEST['id'];
        $cliente = $clienteModel->getCliente($id);
        $_SESSION['cliente'] = $cliente;
        header('Location: ../view/actualizarC.php');
        break;
    case "actualizarC":
        $id = $_REQUEST['id'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
        $clienteModel->actualizarCliente($id, $cedula, $nombres, $apellidos);
        $listadoC = $clienteModel->getClientes();
        $_SESSION['listadoclis'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;
    default:header('Location: ../clientes.php');
}