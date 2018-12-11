<?php
require_once '../model/ClienteModel.php';
session_start();

$clienteModel = new ClienteModel();
$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
switch ($opcion) {
    case "listarC":
//obtenemos la lista de productos:
        $listado = $clienteModel->getClientes(true);
//y los guardamos en sesion:
        $_SESSION['listadoclis'] = serialize($listado);
        //obtenemos el valor total de productos y guardamos en sesion:
        header('Location: ../clientes.php');
        break;
    
    case "crearC":
//navegamos a la pagina de creacion:
        header('Location: ../view/crearC.php');
        break;
    case "guardar":
//obtenemos los valores ingresados por el usuario en el formulario:
        $id = $_REQUEST['id'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
//creamos un nuevo producto:
        try {
            $clienteModel->crearCliente($id, $cedula, $nombres, $apellidos);
        } catch (Exception $e) {
//colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
            header('Location: ../clientes.php');
        }
//actualizamos la lista de productos para grabar en sesion:
        $listadoC = $clienteModel->getClientes(true);
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;
    case "eliminar":
//obtenemos el codigo del producto a eliminar:
        $id = $_REQUEST['id'];
//eliminamos el producto:
        $clienteModel->eliminarCliente($id);
//actualizamos la lista de productos para grabar en sesion:
        $listadoC = $clienteModel->getClientes(true);
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;
    case "cargar":
//para permitirle actualizar un producto al usuario primero
//obtenemos los datos completos de ese producto:
        $id = $_REQUEST['id'];
        $cliente = $clienteModel->getCliente($id);
//guardamos en sesion el producto para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['cliente'] = $cliente;
        header('Location: ../view/actualizarC.php');
        break;
    case "actualizar":
//obtenemos los datos modificados por el usuario:
        
          $id = $_REQUEST['id'];
        $cedula = $_REQUEST['cedula'];
        $nombres = $_REQUEST['nombres'];
        $apellidos = $_REQUEST['apellidos'];
//actualizamos los datos del producto:
        $clienteModel->actualizarCliente($id, $cedula, $nombres, $apellidos);
//actualizamos la lista de productos para grabar en sesion:
        $listadoC = $clienteModel->getClientes();
        $_SESSION['listadoC'] = serialize($listado);
        header('Location: ../clientes.php');
        break;
    default:
//si no existe la opcion recibida por el controlador, siempre
//redirigimos la navegacion a la pagina index:
        header('Location: ../clientes.php');
}