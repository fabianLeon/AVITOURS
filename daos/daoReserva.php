<?php

Class daoReserva {

	var $database;

    /**
     * constructor de la clase
     */
    function daoReserva($db) {
        $this->database = $db;
    }

    function getReservas($filtro){
            $sql = "SELECT r.k_reserva AS Id, c1.n_nombre AS Origen, c2.n_nombre AS Destino, t.k_clase||' '||t.k_tipo_tarifa AS Tarifa, r.d_fecha AS Fecha, r.n_telefono AS Telefono, r.i_estado AS Estado
FROM avitour.reserva r left outer join avitour.pago p on r.k_reserva = p.k_reserva, avitour.reserva_vuelo rv, avitour.vuelo v, avitour.ciudad c1, avitour.ciudad c2, avitour.tarifa t 
WHERE k_usuario=current_user AND v.k_vuelo = rv.k_vuelo AND r.k_reserva = rv.k_reserva AND c1.k_ciudad = v.k_ciudad_origen AND c2.k_ciudad = v.k_ciudad_destino AND r.k_tarifa = t.k_tarifa";
            $res = $this->database->ejecutarConsulta($sql);
            return $res;
    }
     function getReservasAdmin(){
            $sql = "SELECT r.k_reserva AS Id, c1.n_nombre AS Origen, c2.n_nombre AS Destino, t.k_clase||' '||t.k_tipo_tarifa AS Tarifa, r.d_fecha AS Fecha, r.n_telefono AS Telefono, case when p.v_confirmacion is not null then 'Pagado' else case when age(r.d_fecha)> interval '2' day then 'Vencido' else 'Vigente' end  end AS Estado 
                    FROM avitour.reserva r left outer join avitour.pago p on r.k_reserva = p.k_reserva, avitour.vuelo v, avitour.ciudad c1, avitour.ciudad c2, avitour.tarifa t 
                    WHERE 
                    v.k_vuelo = r.k_vuelo 
                    AND c1.k_ciudad = v.k_ciudad_origen 
                    AND c2.k_ciudad = v.k_ciudad_destino 
                    AND r.k_tarifa = t.k_tarifa";
            $res = $this->database->ejecutarConsulta($sql);
            return $res;
    }
    function getNextReserva(){
        $sql="SELECT MAX(k_reserva) FROM avitour.reserva";
        $res = $this->database->ejecutarConsulta($sql);
        $res = $this->database->transformarResultado($res);
        return $res[0][0]+1;
    }
    
    function insertReserva($reserva){
        $reserva->k_reserva = $this->getNextReserva();
        $tabla = "avitour.reserva";
        $campos = array("k_reserva","k_tarifa","d_fecha","n_telefono","n_email","n_tarjeta_credito");
        $this->database->insertarRegistro($tabla, $campos, $reserva->toArray());
        
        $tabla = "avitour.reserva_vuelo";
        $campos = array("k_reserva","k_vuelo");
        $this->database->insertarRegistro($tabla, $campos, array($reserva->k_reserva, $reserva->k_vuelo));
    }
    
    function insertSillaReserva($k_reserva, $k_silla, $k_vuelo){
        $tabla = "avitour.detalle_silla";
        $campos = array("k_reserva","k_silla", "k_vuelo");
        $this->database->insertarRegistro($tabla, $campos, array($k_reserva,"'$k_silla'", $k_vuelo));
    }
    
    function insertPasajero($pasajero){
        $tabla = "avitour.pasajero";
        $campos = array("k_identificacion","i_tip_documento","n_primer_nombre","n_segundo_nombre","n_apellido");
        $this->database->insertarRegistro($tabla, $campos, $pasajero->toArray());
    }
    
    function insertPasajeroReserva($k_reserva, $k_pasajero){
        $tabla = "avitour.detalle_silla";
        $campos = array("k_pasajero");
        $this->database->actualizarRegistro($tabla, $campos, array($k_pasajero),"k_reserva = $k_reserva");
    }
    
    function getTotalReserva($k_reserva){
        $sql = "SELECT valor.v_valor*total.pasajeros "
                . "from (SELECT t.v_valor FROM avitour.tarifa t, avitour.reserva r where t.k_tarifa=r.k_tarifa "
                . "AND r.k_reserva = $k_reserva) valor, "
                . "(SELECT count(*) as pasajeros "
                . "from avitour.detalle_silla where k_reserva = $k_reserva) total;";
        $res = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($res)[0];
    }
    
    function getTarjetaCredito($k_reserva){
        $sql = "SELECT r.n_tarjeta_credito FROM avitour.reserva r where r.k_reserva = $k_reserva";
        $res = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($res)[0];
    }
    
    function insertPago($k_reserva){
        $tabla = "avitour.pago";
        $valores = array("concat(".$k_reserva.",now())",$k_reserva,'true');
        return $this->database->insertarRegistro($tabla, array('k_pago','k_reserva','v_confirmacion',), $valores);;
    }
    
    function getReporte($k_reserva){
        $sql = "SELECT avitour.f_generar_reporte_reserva($k_reserva)";
        $res = $this->database->ejecutarConsulta($sql);
        return $this->database->transformarResultado($res)[0][0];
    }
}
?>
