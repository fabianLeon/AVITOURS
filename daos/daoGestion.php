<?php

/**
 * Description of daoUsuario
 *
 * @author FABIO
 */
class daoGestion {
    var $database;
	
	/**
     * constructor de la clase
     */
    function daoGestion($db) {
        $this->database = $db;
    }
	
    function getPaises(){
            $sql = "SELECT k_pais, n_nombre FROM avitour.pais ORDER BY n_nombre";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }
    
    function getCiudades(){
            $sql = "SELECT k_ciudad, n_nombre FROM avitour.ciudad ORDER BY n_nombre";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }

    function getTipoAvion(){
            $sql = "SELECT k_tipo_avion, n_nombre FROM avitour.tipo_avion ORDER BY n_nombre";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }
    
    function insertCiudad($pais, $ciudad){
        $tabla = "avitour.ciudad";
        $campos = array("k_ciudad","k_pais","n_nombre");
        $valores = array($this->getNextValue("k_ciudad", "avitour.ciudad"),$pais,$ciudad);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
    function getNextValue($campo, $tabla){
        $sql="SELECT MAX($campo) FROM $tabla";
        $res = $this->database->ejecutarConsulta($sql);
        $res = $this->database->transformarResultado($res);
        return $res[0][0]+1;
    }
    
    function insertAvion($tipo, $fecha){
        $tabla = "avitour.avion";
        $campos = array("k_avion","k_tipo_avion","d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla),$tipo,$fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
    function insertVuelo($tipo, $fecha){
        $tabla = "avitour.avion";
        $campos = array("k_avion","k_tipo_avion","d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla),$tipo,$fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
}
?>