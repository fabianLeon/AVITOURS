<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dao
 *
 * @author FABIO
 */
Class dao {

    var $link;
    var $host = null;
    var $usuario = null;
    var $password = null;
    var $database = null;
    var $log = null;

    /**
     * constructor de la clase
     */
    function dao($h, $u, $p, $db) {
        $this->host = $h;
        $this->usuario = $u;
        $this->password = $p;
        $this->database = $db;
        //$this->conectar();
    }

    /**
     * hace la coneccion con la base de datos
     */
//    function conectarCreador() {
//        $this->link = pg_connect("host=$this->host dbname=$this->database user=" . DB_USER_CREATOR . " password=" . DB_PASSWORD_CREATOR);
//    }
	
//	function conectarConsulta() {
//        $this->link = pg_connect("host=$this->host dbname=$this->database user=" . DB_USER_CONS . " password=" . DB_PASSWORD_CONS);
//    }

    function conectar() {
        $this->link = pg_connect("host=$this->host dbname=$this->database user=$this->usuario password=$this->password");
    }

    /**
     * ejecuta consultas en la base de datos
     *
     * @param string $sql cadena para consulta
     */
    function ejecutarConsulta($sql) {
        //echo ("<br>sql:".$sql);
        $result = pg_query($this->link, $sql);
        return $result;
    }

    function transformarResultado($result) {
        $res = array();
        while ($row = pg_fetch_row($result)) {
            $res[count($res)] = $row;
        }
        return $res;
    }

    function getTitulos($result) {
        $num = pg_num_fields($result);
        $titulos = array();
        for ($i = 0; $i < $num; $i++) {
            $titulos[$i] = pg_field_name($result, $i);
        }
        return $titulos;
    }

    /**
     * almacena en la base datos de acuerdo a los parametros
     *
     * @param string $tabla tabla afectada
     * @param Array $campos campos afectados
     * @param Array $valores valores almacenados
     */
    function insertarRegistro($tabla, $campos, $valores) {
        $temp = "";
        $tempCampos = "";
        foreach ($valores as $v) {
            if ($v == "''") {
                $temp .= 'null,';
            } else {
                $temp .= $v . ",";
            }
        }
        foreach ($campos as $c) {
            $tempCampos .= $c . ",";
        }
        $temp = substr($temp, 0, strlen($temp) - 1);
        $tempCampos = substr($tempCampos, 0, strlen($tempCampos) - 1);
        $sql = "insert into " . $tabla . "(" . $tempCampos . ")values(" . $temp . ")";
        echo $sql."<hr>";
        return pg_query($sql);
    }

    function getQueryError($result) {
        return pg_result_error_field($result, PGSQL_DIAG_SQLSTATE);
    }

    /**
     * borra registros de la base datos de acuerdo a los parametros
     *
     * @param string $tabla tabla afectada
     * @param string $predicado condicion requerida
     */
    function borrarRegistro($tabla, $predicado) {
        $sql = "delete from " . $tabla . " where " . $predicado;
        //echo ("<br>borrar:".$sql);
        return pg_query($sql);
    }

    /**
     * actualiza registros en la base datos de acuerdo a los parametros
     *
     * @param string $tabla tabla afectada
     * @param array $campos campos afectados
     * @param array $valores valores almacenados
     * @param string $condicion where de la sentecia sql
     */
    function actualizarRegistro($tabla, $campos, $valores, $condicion) {
        $sql = "update " . $tabla . " set ";
        $cont = 0;

        foreach ($campos as $c) {
            if ($valores[$cont] == "''" || $valores[$cont] == "")
                $sql .= $c . " = null , ";
            else
                $sql .= $c . " = " . $valores[$cont] . ", ";
            $cont++;
        }
        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " where " . $condicion;
        //echo ("<br>actualizar:".$sql."<hr>");
        return pg_query($sql);
    }

    public function cerrarConexion() {
        pg_close($this->link);
    }

}

?>
