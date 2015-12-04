<?php

/**
 * Description of daoUsuario
 *
 * @author FABIO
 */
class daoAvion {
    var $database;
	
	/**
     * constructor de la clase
     */
    function daoAvion($db) {
        $this->database = $db;
    }
	
	function getSillas($idVuelo){
		$sql = "SELECT k_silla 
				FROM avitour.vuelo v, avitour.avion a, avitour.silla s 
				WHERE v.k_avion = a.k_avion 
					AND a.k_tipo_avion = s.k_tipo_avion
					AND v.k_vuelo = $idVuelo";

		return $this->database->ejectutarConsulta($sql);
	}
	
	function getSillasReserva($idVuelo){
		$sql = "SELECT querySilla.*, 
				CASE WHEN querySilla.k_silla IN 
				(SELECT s.k_silla 
				FROM avitour.reserva r, avitour.vuelo v, avitour.detalle_silla s, avitour.reserva_vuelo rv 
				WHERE r.k_reserva = rv.k_reserva AND rv.k_vuelo = v.k_vuelo
					AND r.k_reserva= s.k_reserva
					AND v.k_vuelo = $idVuelo) THEN '1'
				ELSE '0'
				END 
				FROM  
				(SELECT k_silla, n_pos_x, n_pos_y  
				FROM avitour.vuelo v, avitour.avion a, avitour.silla s 
				WHERE v.k_avion = a.k_avion 
					AND a.k_tipo_avion = s.k_tipo_avion
					AND v.k_vuelo = $idVuelo) querySilla";
		//echo $sql;
		$result = $this->database->ejecutarConsulta($sql);
		$sillas = $this->database->transformarResultado($result);
		$array = null;
		
		foreach($sillas as $silla){
			$array[$silla[1]][$silla[2]] = "".$silla[3]." ".$silla[0];
		}
		return $array;
	}
	
}
?>