<?php


class Reserva {
    var $k_reserva;
    var $k_vuelo;
    var $k_tarifa;
    var $d_fecha;
    var $n_telefono;
    var $n_email;
    var $n_tarjeta_credito;
    
    function __construct($k_reserva, $k_vuelo, $k_tarifa, $d_fecha, $n_telefono, $n_email, $n_tarjeta_credito) {
        $this->k_reserva = $k_reserva;
        $this->k_vuelo = $k_vuelo;
        $this->k_tarifa = $k_tarifa;
        $this->d_fecha = $d_fecha;
        $this->n_telefono = $n_telefono;
        $this->n_email = $n_email;
        $this->n_tarjeta_credito = $n_tarjeta_credito;
    }

    function getK_reserva() {
        return $this->k_reserva;
    }

    function getK_vuelo() {
        return $this->k_vuelo;
    }

    function getK_tarifa() {
        return $this->k_tarifa;
    }

    function getD_fecha() {
        return $this->d_fecha;
    }

    function getN_telefono() {
        return $this->n_telefono;
    }

    function getN_email() {
        return $this->n_email;
    }

    function getN_tarjeta_credito() {
        return $this->n_tarjeta_credito;
    }

    function setK_reserva($k_reserva) {
        $this->k_reserva = $k_reserva;
    }

    function setK_vuelo($k_vuelo) {
        $this->k_vuelo = $k_vuelo;
    }

    function setK_tarifa($k_tarifa) {
        $this->k_tarifa = $k_tarifa;
    }

    function setD_fecha($d_fecha) {
        $this->d_fecha = $d_fecha;
    }

    function setN_telefono($n_telefono) {
        $this->n_telefono = $n_telefono;
    }

    function setN_email($n_email) {
        $this->n_email = $n_email;
    }

    function setN_tarjeta_credito($n_tarjeta_credito) {
        $this->n_tarjeta_credito = $n_tarjeta_credito;
    }

    function toArray(){
        return array($this->k_reserva,
            $this->k_vuelo,
            "'$this->k_tarifa'", 
            "$this->d_fecha",
            "'$this->n_telefono'",
            "'$this->n_email'",
            "'$this->n_tarjeta_credito'");
    }
    
}
