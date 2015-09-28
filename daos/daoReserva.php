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
            $sql = "";
            $res = $this->database->ejecutarConsulta($sql);
            $arr = array();
            while ($row = pg_fetch_row($res)) {
                    $arr[count($arr)] = $row;
            }
            return $arr;
    }
}
?>
