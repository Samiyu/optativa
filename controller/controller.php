<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/ProductoModel.php';
require_once '../model/ClienteModel.php';
session_start();
$productoModel = new ProductoModel();
$clienteModel = new ClienteModel();

$opcion = $_REQUEST['opcion'];
//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);
switch ($opcion) {
    case "listar":
//obtenemos la lista de productos:
        $listado = $productoModel->getProductos(true);
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        //obtenemos el valor total de productos y guardamos en sesion:
        $_SESSION['valorTotal'] = $productoModel->getValorProductos();
        header('Location: ../productos.php');
        break;
    case "listar_desc":
//obtenemos la lista de productos:
        $listado = $productoModel->getProductos(false);
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
//obtenemos el valor total de productos:
        $_SESSION['valorTotal'] = $productoModel->getValorProductos();
        header('Location: ../productos.php');
        break;
    case "crear":
//navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;
    case "guardar":
//obtenemos los valores ingresados por el usuario en el formulario:
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
//creamos un nuevo producto:
        try {
            $productoModel->crearProducto($codigo, $nombre, $precio, $cantidad);
        } catch (Exception $e) {
//colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e->getMessage();
            header('Location: ../productos.php');
        }
       // $productoModel->crearProducto($codigo, $nombre, $precio, $cantidad);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos(true);
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../productos.php');
        break;
    case "eliminar":
//obtenemos el codigo del producto a eliminar:
        $codigo = $_REQUEST['codigo'];
//eliminamos el producto:
        $productoModel->eliminarProducto($codigo);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos(true);
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../productos.php');
        break;
    case "cargar":
//para permitirle actualizar un producto al usuario primero
//obtenemos los datos completos de ese producto:
        $codigo = $_REQUEST['codigo'];
        $producto = $productoModel->getProducto($codigo);
//guardamos en sesion el producto para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['producto'] = $producto;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
//obtenemos los datos modificados por el usuario:
        $codigo = $_REQUEST['codigo'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $cantidad = $_REQUEST['cantidad'];
//actualizamos los datos del producto:
        $productoModel->actualizarProducto($codigo, $nombre, $precio, $cantidad);
//actualizamos la lista de productos para grabar en sesion:
        $listado = $productoModel->getProductos();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../productos.php');
        break;
    default:
//si no existe la opcion recibida por el controlador, siempre
//redirigimos la navegacion a la pagina index:
        header('Location: ../productos.php');
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
    case "guardarC":
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
    case "eliminarC":
//obtenemos el codigo del producto a eliminar:
        $id = $_REQUEST['id'];
//eliminamos el producto:
        $clienteModel->eliminarCliente($id);
//actualizamos la lista de productos para grabar en sesion:
        $listadoC = $clienteModel->getClientes(true);
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;
    case "cargarC":
//para permitirle actualizar un producto al usuario primero
//obtenemos los datos completos de ese producto:
        $id = $_REQUEST['id'];
        $cliente = $clienteModel->getCliente($id);
//guardamos en sesion el producto para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['cliente'] = $cliente;
        header('Location: ../view/actualizarC.php');
        break;
    case "actualizarC":
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
}
