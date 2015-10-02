<?php

/*
 * To change this 	license header, choose License Headers in Project Properties.
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
	
	function getVuelosTarifas($filtro){
		$sql = "SELECT k_tipo_tarifa from avitour.tipo_tarifa";
		$res = $this->database->ejecutarConsulta($sql);
        $tarifas = $this->database->transformarResultado($res);
		
		$sql2 = "SELECT v.k_vuelo AS Id,
					c.n_nombre AS Origen,
					c2.n_nombre AS Destino,
					v.d_fecha_salida AS Salida,
					v.d_fecha_llegada AS Llegada,
					age(v.d_fecha_llegada,v.d_fecha_salida) AS Duracion 
				FROM avitour.vuelo v, avitour.ciudad c, avitour.ciudad c2 
				WHERE v.k_ciudad_origen = c.k_ciudad 
				AND v.k_ciudad_destino = c2.k_ciudad AND $filtro";
		$res = $this->database->ejecutarConsulta($sql2);
        $vuelos = $this->database->transformarResultado($res);
		
		for($i=0;$i<count($vuelos);$i++){
			$vuelo = $vuelos[$i];
			
			foreach(array("Economica","Ejecutiva") as $clase){
				foreach($tarifas as $tipo){
					$sql3 = "SELECT cast(v_valor as money) from avitour.tarifa t WHERE t.k_vuelo = ".$vuelo[0]." AND t.k_clase = 'Economica' AND k_tipo_tarifa = '".$tipo[0]."';";
					//echo $sql3."<br>";
					$res = $this->database->ejecutarConsulta($sql3);
					try{
						$tarifa = $this->database->transformarResultado($res);

						if(count($tarifa)>0){
							$vuelos[$i] = array_merge($vuelos[$i],array('<input type="radio" name="tarifas" value="'.$vuelo[0].'_'.$tipo[0].'"><br>'.$tarifa[0][0]));
						}else{
							$vuelos[$i] = array_merge($vuelos[$i],array('<p style="color:#F9690E; text-align:center;"> No Disponible </p>'));
						}
						
					}catch(Exception $e){
						$vuelos[$i] = array_merge($vuelos[$i],array('<p style="color:#F9690E; text-align:center;"> No Disponible </p>'));
					}
				}
			}
		}
		return $vuelos;
	}
}
?>