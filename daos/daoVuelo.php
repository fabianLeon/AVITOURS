<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of daoVuelo
 *
 * @author FABIO
 */
Class daoVuelo{

    var $database;

    /**
     * constructor de la clase
     */
    function daoVuelo($db) {
        $this->database = $db;
    }

    function getVuelos($filtro){
            $sql = "SELECT v.k_vuelo AS Id, c.n_nombre AS Origen, c2.n_nombre AS Destino, "
                    . "v.d_fecha_salida AS Salida, v.d_fecha_llegada AS Llegada, "
                    . "age(v.d_fecha_llegada,v.d_fecha_salida) AS Duracion  "
                    . "FROM avitour.vuelo v, avitour.ciudad c, avitour.ciudad c2 "
                    . "WHERE v.k_ciudad_origen = c.k_ciudad "
                    . "AND v.k_ciudad_destino = c2.k_ciudad AND $filtro";
            $res = $this->database->ejecutarConsulta($sql);
            $arr = $this->database->transformarResultado($res);
            return $arr;
    }
}
?>