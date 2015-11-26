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
	
	function getPaises($idVuelo){
		$sql = "SELECT k_pais, n_nombre FROM avitour.pais ORDER BY n_nombre";
		return $this->database->ejectutarConsulta($sql);
	}
	
}
?>