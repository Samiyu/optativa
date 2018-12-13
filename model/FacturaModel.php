<?php
include 'Database.php';
include 'Factura.php';
/**
 * Componente model para el manejo de productos.
 *
 * @author mrea
 */
class FacturaModel {

    public function getFacturas() {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();
            $sql = "select * from proveedor;";
           $resultad = $pdo->query($sql);
        $listadof = array();
        foreach ($resultad as $res) {
            $factura = new Factura();
            $factura->setId($res['id']);
            $factura->setNombre($res['nombre']);
            $factura->setDireccion($res['direccion']);
	    $factura->setTelefono($res['telefono']);
            $factura->setEmail($res['email']);
            array_push($listadof, $factura);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listadof;
    }
    public function actualizarFactura($id, $nombre, $direccion,$telefono, $email) {
//Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update proveedor set nombre=?,direccion=?,telefono=?,email=? where id=?;";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($nombre, $direccion,$telefono, $email,$id));
        Database::disconnect();
    }
  
    public function crearFactura($id, $nombre, $direccion,$telefono, $email) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "insert into proveedor (id,nombre,direccion,telefono,email) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($id, $nombre, $direccion,$telefono, $email) );
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }
    
    public function eliminarFactura($id) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from proveedor where id=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($id));
        Database::disconnect();
    }
}
