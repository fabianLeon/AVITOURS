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
    
    function getCiudadesPaise(){
        $sql = "SELECT p.n_nombre, c.n_nombre FROM avitour.ciudad c, avitour.pais p WHERE c.k_pais = p.k_pais ORDER BY p.n_nombre,c.n_nombre";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getAviones(){
        $sql = "SELECT a.k_avion, ta.n_nombre||' - '||a.k_avion FROM avitour.avion a, avitour.tipo_avion ta WHERE a.k_tipo_avion = ta.k_tipo_avion";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }
    
    function getTipoAvion(){
            $sql = "SELECT k_tipo_avion, n_nombre FROM avitour.tipo_avion ORDER BY n_nombre";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }
    
    function getIdTipoAvion($tipo){
            $sql = "SELECT k_tipo_avion FROM avitour.tipo_avion where n_nombre like '".$tipo."'";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }
    
    function getIdPais($pais){
            $sql = "SELECT k_pais, n_nombre FROM avitour.pais where n_nombre like '".$pais."'";
            $result = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($result);
    }
    
    function insertCiudad($pais, $ciudad){
        $tabla = "avitour.ciudad";
        $id_pais = $this->getIdPais($pais);
        $campos = array("k_ciudad","k_pais","n_nombre");
        $valores = array($this->getNextValue("k_ciudad", "avitour.ciudad"),$id_pais[0][0],"'".$ciudad."'");
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
        $idTipo = $this->getIdTipoAvion($tipo);
        $campos = array("k_avion","k_tipo_avion","d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla),$idTipo[0][0],"'".$fecha."'");
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
    function insertVuelo($tipo, $fecha){
        $tabla = "avitour.vuelo";
        $campos = array("k_avion","k_tipo_avion","d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla),$tipo,$fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
     function insertTarifa($tipo, $fecha){
        $tabla = "avitour.tarifa";
        $campos = array("k_avion","k_tipo_avion","d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla),$tipo,$fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
    
}
?>