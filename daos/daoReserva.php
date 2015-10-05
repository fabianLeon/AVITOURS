<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of daoReserva
 *
 * @author FABIO
 */
Class daoReserva {

	var $database;

    /**
     * constructor de la clase
     */
    function daoReserva($db) {
        $this->database = $db;
    }

    function getReservas($filtro){
            $sql = "SELECT r.k_reserva AS Id, c1.n_nombre AS Origen, c2.n_nombre AS Destino, t.k_clase||' '||t.k_tipo_tarifa AS Tarifa, r.d_fecha AS Fecha, r.n_telefono AS Telefono
                    FROM avitour.reserva r, avitour.vuelo v, avitour.ciudad c1, avitour.ciudad c2, avitour.tarifa t 
                    WHERE k_usuario=current_user 
                    AND v.k_vuelo = r.k_vuelo 
                    AND c1.k_ciudad = v.k_ciudad_origen 
                    AND c2.k_ciudad = v.k_ciudad_destino 
                    AND r.k_tarifa = t.k_tarifa";
            $res = $this->database->ejecutarConsulta($sql);
            return $res;
    }
    
    function getNextReserva(){
        $sql="SELECT MAX(k_reserva) FROM avitour.reserva";
        $res = $this->database->ejecutarConsulta($sql);
        $res = $this->database->transformarResultado($res);
        return $res[0][0]+1;
    }
    
    function insertReserva($reserva){
        $reserva->k_reserva = $this->getNextReserva();
        $tabla = "avitour.reserva";
        $campos = array("k_reserva","k_vuelo","k_tarifa","d_fecha","n_telefono","n_email","n_tarjeta_credito");
        $this->database->insertarRegistro($tabla, $campos, $reserva->toArray());
    }
}
?>
