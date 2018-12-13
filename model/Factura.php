<?php

/**
 * Entidad Producto. Representa a la tabla producto en la base de datos.
 *
 * @author curso
 */
class Factura {

    private $id,$ref_cliente,$total,$fecha,$email;
    function getId() {
        return $this->id;
    }
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

        function getRef_cliente() {
        return $this->ref_cliente;
    }

    function getTotal() {
        return $this->total;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRef_cliente($ref_cliente) {
        $this->ref_cliente = $ref_cliente;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}