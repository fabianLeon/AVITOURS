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
		$sql = "SELECT * FROM avitour.vuelo v WHERE $filtro";
		$res = $this->database->ejecutarConsulta($sql);
		$arr = array();
		while ($row = pg_fetch_row($res)) {
			$arr[count($arr)] = $row;
		}
		return $arr;
	}
}
?>