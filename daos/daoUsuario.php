<?php

/**
 * Description of daoUsuario
 *
 * @author FABIO
 */
class daoUsuario {
    var $database;

    /**
     * constructor de la clase
     */
    function daoUsuario($db) {
        $this->database = $db;
    }

    function crearUsuario($user, $pass){
            $sql = "CREATE USER $user WITH PASSWORD '$pass';"
                    . "GRANT r_avitour_user to $user;";
            echo $sql;
            $res = $this->database->ejecutarConsulta($sql);
            return $res;
    }
	
	function insertInfoUsuario($user, $nombre1, $nombre2, $apellido1, $apellido2, $v_telefono){
		$tabla = "avitour.usuario";
		$campos = array("k_usuario","n_nombre_1","n_nombre_2","n_apellido_1","n_apellido_2","v_telefono");
		$valores = array("'".$user."'","'".$nombre1."'", "'".$nombre2."'", "'".$apellido1."'", "'".$apellido2."'", "'".$v_telefono."'");
		return $this->database->insertarRegistro($tabla, $campos, $valores);
	}
	
	function getGroupRole(){
            $sql = "select avitour.f_rol_asociado()";
            $res = $this->database->ejecutarConsulta($sql);
            return $this->database->transformarResultado($res);
    }
}
