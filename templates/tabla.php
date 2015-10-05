<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Tabla {

    var $tabla = null;
    var $titulos = null;
    var $t = null;

    /**
     * constructor de la clase
     */
    function Tabla($tit, $tab) {
        $this->titulos = $tit;
        $this->tabla = $tab;
        $this->t = "";
    }

    function EscribirRegistros($linkX, $linkV) {
        $this->t .= " <div class='panel panel-warning'>
                       <table class='table table-bordered'>
                       <thead>";
        foreach ($this->titulos as $valor) {
            $this->t .= "<th>$valor</th>";
        }
        $this->t .= "<th>Opcion</th>";
        $this->t .= "</tr></thead><tbody>";
        foreach ($this->tabla as $registro) {
            $this->t .= "<tr>";
            foreach ($registro as $campo) {

                $this->t .= "<th style='text-align:center'>$campo</th>";
            } $this->t .= "<th>";
            if ($linkV != "") {
                $this->t .= "<a href='$linkV?id=$registro[0]' class='btn btn-Default ' role='button' >
                            <span class='glyphicon glyphicon-remove-circle' aria-hidden='true'>
                            </span>
                         </a>";
                
            }
            $this->t .= "<a href='$linkX?id=$registro[0]' class='btn btn-warning' role='button' >
                            <span class='glyphicon glyphicon-search' aria-hidden='true'>
                            </span>
                         </a>";
            $this->t .= "</th>";
        }

        $this->t .= "</tr>";
        $this->t .= "</tbody></table></div>";
    }

    function escribirRegistros2() {
        $this->t .= " <div class='panel panel-warning'>
                       <table class='table table-bordered'>
                       <thead>";
        foreach ($this->titulos as $valor) {
            $this->t .= "<th>$valor</th>";
        }
        $this->t .= "</tr></thead><tbody>";
        foreach ($this->tabla as $registro) {
            $this->t .= "<tr>";
            foreach ($registro as $campo) {

                $this->t .= "<th style='text-align:center'>$campo</th>";
            }
        }

        $this->t .= "</tr>";
        $this->t .= "</tbody></table></div>";
    }
    
    function getTabla() {
        return $this->t;
    }

}
