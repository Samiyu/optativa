<?php
include 'Database.php';
include 'Factura.php';
/**
 * Componente model para el manejo de productos.
 *
 * @author mrea
 */
class FacturaModel {

    public function getFacturas($ordenf) {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
//verificamos el ordenamiento asc o desc:
        if ($ordenf == true)//asc
            $sql = "select * from factura order by id";
        else //desc
            $sql = "select * from factura order by id desc";
        $resultado = $pdo->query($sql);
//transformamos los registros en objetos de tipo Producto:
        $listadof = array();
        foreach ($resultado as $res) {
            $factura = new Cliente();
            $factura->setId($res['id']);
            $factura->setCedula($res['cedula']);
            $factura->setNombres($res['nombres']);
	    $factura->setApellidos($res['apellidos']);
            array_push($listadof, $factura);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listadof;
    }
  
    public function crearFactura($id, $ref_factura, $ref_producto, $cantidad,$precio,$subtotal) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into detallefactura (id,ref_factura,ref_producto,cantidad,precio,subtotal) values(?,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        try {
            $consulta->execute(array($id, $ref_factura, $ref_producto, $cantidad,$precio,$subtotal) );
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        //$consulta->execute(array($codigo, $nombre, $precio, $cantidad));
        Database::disconnect();
    }
    
    public function eliminarFactura($id) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from factura where id=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id));
        Database::disconnect();
    }

  
}
