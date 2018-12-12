<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/ProductoModel.php';
require_once '../ model/ClienteModel.php';
require_once './../model/FacturaModel.php';
session_start();
$productoModel = new ProductoModel();
$clienteModel = new ClienteModel();
$facturaModel = new FacturaModel();
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
            $_SESSION['mensaje'] = $e->getMessage();
            header('Location: ../clientes.php');
        }
        $listadoC = $clienteModel->getClientes(true);
        $_SESSION['listadoC'] = serialize($listadoC);
        header('Location: ../clientes.php');
        break;

    case "eliminarC":
        $id = $_REQUEST['id'];

        $clienteModel->eliminarCliente($id);

        $listadoC = $clienteModel->getClientes(true);
        $_SESSION['listadoC'] = serialize($listadoC);
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
        $_SESSION['listadoC'] = serialize($listado);
        header('Location: ../clientes.php');
        break;
//    ---------------------FACTURAS----------------------------------
    case "listarF":

        $listado = $facturaModel->getFacturas(true);
        $_SESSION['listadofac'] = serialize($listado);
        header('Location: ../clientes.php');
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
