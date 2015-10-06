<?php


class Pasajero {
    var $k_identifiacion;
    var $i_tipo_documento;
    var $n_primer_nombre;
    var $n_segundo_nombre;
    var $n_apellido;
    
    function __construct($k_identifiacion, $i_tipo_documento, $n_primer_nombre, $n_segundo_nombre, $n_apellido) {
        $this->k_identifiacion = $k_identifiacion;
        $this->i_tipo_documento = $i_tipo_documento;
        $this->n_primer_nombre = $n_primer_nombre;
        $this->n_segundo_nombre = $n_segundo_nombre;
        $this->n_apellido = $n_apellido;
    }

    function getK_identifiacion() {
        return $this->k_identifiacion;
    }

    function getI_tipo_documento() {
        return $this->i_tipo_documento;
    }

    function getN_primer_nombre() {
        return $this->n_primer_nombre;
    }

    function getN_segundo_nombre() {
        return $this->n_segundo_nombre;
    }

    function getN_apellido() {
        return $this->n_apellido;
    }

    function setK_identifiacion($k_identifiacion) {
        $this->k_identifiacion = $k_identifiacion;
    }

    function setI_tipo_documento($i_tipo_documento) {
        $this->i_tipo_documento = $i_tipo_documento;
    }

    function setN_primer_nombre($n_primer_nombre) {
        $this->n_primer_nombre = $n_primer_nombre;
    }

    function setN_segundo_nombre($n_segundo_nombre) {
        $this->n_segundo_nombre = $n_segundo_nombre;
    }

    function setN_apellido($n_apellido) {
        $this->n_apellido = $n_apellido;
    }

    function toArray(){
        return array("'$this->k_identifiacion'",
            "'$this->i_tipo_documento'",
            "'$this->n_primer_nombre'",
            "'$this->n_segundo_nombre'",
            "'$this->n_apellido'");
    }
}
