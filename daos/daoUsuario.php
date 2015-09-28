<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            $res = $this->database->ejecutarConsulta($sql);
            return $res;
    }
}
