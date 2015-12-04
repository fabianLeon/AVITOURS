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

    function transpuesta($matriz) {
        for ($i = 0; $i < count($matriz); $i ++) {
            for ($j = 0; $j < count($matriz[$i]); $j ++) {
                $temp[$j][$i] = $matriz [$i][$j];
            }
        }
        return $temp;
    }

    
    function getTotalEstados($estado){
        $sql = "select total from (select count(r.k_reserva) total, meses.id mes from avitour.reserva r RIGHT JOIN (VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12)) meses(id) ON extract(month from r.d_fecha)=meses.id WHERE r.i_estado = '$estado' GROUP BY meses.id ORDER BY meses.id) tab1 right join (VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12)) meses(id) ON tab1.mes=meses.id";
        $result = $this->database->ejecutarConsulta($sql);
        $result1 = $this->database->transformarResultado($result);
        return $this->transpuesta($result1);
    }
    
    function getVentas() {
        $sql = "select sum(r.v_total), to_char(to_timestamp('1990-'||meses.id||'-00', 'YYYY-mm-dd'),'Mon') from avitour.reserva r RIGHT JOIN (VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12)) meses(id) ON extract(month from r.d_fecha)=meses.id GROUP BY meses.id ORDER BY meses.id";
        $result = $this->database->ejecutarConsulta($sql);
        $result1 = $this->database->transformarResultado($result);
        return $this->transpuesta($result1);
    }

    function get_top5_usuarios() {
        $sql = "select  (u.n_nombre_1||' '||u.n_nombre_2||' '||u.n_apellido_1||' '||u.n_apellido_2) usuario, count(k_reserva) reservas 
                from avitour.reserva r, avitour.usuario u 
                where u.k_usuario = r.k_usuario 
                group by usuario order by reservas desc limit 5;";
        $result = $this->database->ejecutarConsulta($sql);
        $result1 = $this->database->transformarResultado($result);
        return $this->transpuesta($result1);
    }

    function get_top5_ciudad() {
        $sql = "select  c.n_nombre ciudad, count(r.k_reserva) reservas
                from avitour.ciudad c, avitour.vuelo v, avitour.reserva r, avitour.reserva_vuelo rv
                where r.k_reserva = rv.k_reserva and
                v.k_vuelo = rv.k_vuelo and
                v.k_ciudad_destino = c.k_ciudad
                group by ciudad order by reservas desc limit 5;";
        $result = $this->database->ejecutarConsulta($sql);
        $result1 = $this->database->transformarResultado($result);
        return $this->transpuesta($result1);
    }

    function getPaises() {
        $sql = "SELECT k_pais, n_nombre FROM avitour.pais ORDER BY n_nombre";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getCiudades() {
        $sql = "SELECT k_ciudad, n_nombre FROM avitour.ciudad ORDER BY n_nombre";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getCiudadesPaise() {
        $sql = "SELECT p.n_nombre, c.n_nombre FROM avitour.ciudad c, avitour.pais p WHERE c.k_pais = p.k_pais ORDER BY p.n_nombre,c.n_nombre";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getAviones() {
        $sql = "SELECT a.k_avion, ta.n_nombre||' - '||a.k_avion FROM avitour.avion a, avitour.tipo_avion ta WHERE a.k_tipo_avion = ta.k_tipo_avion";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getTipoAvion() {
        $sql = "SELECT k_tipo_avion, n_nombre FROM avitour.tipo_avion ORDER BY n_nombre";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getIdTipoAvion($tipo) {
        $sql = "SELECT k_tipo_avion FROM avitour.tipo_avion where n_nombre like '" . $tipo . "'";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function getIdPais($pais) {
        $sql = "SELECT k_pais, n_nombre FROM avitour.pais where n_nombre like '" . $pais . "'";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }
    
    function getIdCiuadad($ciudad) {
        $sql = "SELECT k_ciudad, n_nombre FROM avitour.ciudad where n_nombre like '" . $ciudad . "'";
        $result = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($result);
    }

    function insertCiudad($pais, $ciudad,$x,$y) {
        $tabla = "avitour.ciudad";
        $id_pais = $this->getIdPais($pais);
        $campos = array("k_ciudad", "k_pais", "n_nombre","q_x","q_y");
        $valores = array($this->getNextValue("k_ciudad", "avitour.ciudad"), $id_pais[0][0], "'" . $ciudad . "'","'".$x."'","'".$y."'");
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }

    function getNextValue($campo, $tabla) {
        $sql = "SELECT MAX($campo) FROM $tabla";
        $res = $this->database->ejecutarConsulta($sql);
        $res = $this->database->transformarResultado($res);
        return $res[0][0] + 1;
    }

    function insertAvion($tipo, $fecha) {
        $tabla = "avitour.avion";
        $idTipo = $this->getIdTipoAvion($tipo);
        $campos = array("k_avion", "k_tipo_avion", "d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla), $idTipo[0][0], "'" . $fecha . "'");
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }

    function insertVuelo($tipo, $fecha) {
        $tabla = "avitour.vuelo";
        $campos = array("k_avion", "k_tipo_avion", "d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla), $tipo, $fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }
    
    function insertVuelo2($f_salida, $f_llegada,$c_origen,$c_destino,$avion) {
        $tabla = "avitour.vuelo";
        $campos = array("k_vuelo","k_aerolinea", "k_ciudad_origen", "k_ciudad_destino","d_fecha_salida", "d_fecha_llegada","k_avion");
        $valores = array($this->getNextValue("k_vuelo", $tabla), "1", $c_origen, $c_destino, "'$f_salida'", "'$f_llegada'", $avion);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }

    function insertTarifa($tipo, $fecha) {
        $tabla = "avitour.tarifa";
        $campos = array("k_avion", "k_tipo_avion", "d_fecha_ingreso");
        $valores = array($this->getNextValue("k_avion", $tabla), $tipo, $fecha);
        $this->database->insertarRegistro($tabla, $campos, $valores);
    }

}

?>