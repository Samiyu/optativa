<?php

/**
 * Clase utilitaria que maneja la conexion/desconexion a la base de datos
 * mediante las funciones PDO (PHP Data Objects).
 * Utiliza el patron de diseno singleton para el manejo de la conexion.
 * @author mrea
 */
class Database {

//Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'productos';
    private static $dbHost = 'localhost'; // (ya aplicado...poner ip, o nombre del host)
    private static $dbUsername = 'root';
    private static $dbUserPassword = ''; //clavede usuario root
    //si hubiera cambiado el puerto default... private $dbport='3300';
    //luego en el metodo connect() usar la variable sumar .port='3300'
    
//Propiedad para control de la conexion:
    private static $conexion = null;

    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct() {
        exit('No se permite instanciar esta clase.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */
    public static function connect() {
// Una sola conexion para toda la aplicacion (singleton):
        if (null == self::$conexion) {
            try {
             self::$conexion =  new PDO('pgsql:host=ec2-54-204-36-249.compute-1.amazonaws.com;port=5432;dbname=d22eokasrcc2a4', 'fwrgdmkgnuxwuv', 'd574cc1b39cd919416de09c501765403fc3481805e8b41b83edd8dd6cf12e236'); 		self::$conexion =  new PDO('pgsql:host=ec2-54-204-36-249.compute-1.amazonaws.com;port=5432;dbname=d22eokasrcc2a4', 'fwrgdmkgnuxwuv', 'd574cc1b39cd919416de09c501765403fc3481805e8b41b83edd8dd6cf12e236');  
             //  self::$conexion =  new PDO('pgsql:host=localhost;port=5432;dbname=productos', 'postgres', 'admin'); 

            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect() {
        self::$conexion = null;
    }
}
?>
*/