<?php

/**
 * Entidad Producto. Representa a la tabla producto en la base de datos.
 *
 * @author curso
 */
class Cliente {

    private $id;
    private $cedula;
    private $nombres;
    private $apellidos;

    function getId() {
        return $this->id;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }


    

}
