-- Function: avitour.f_actualizar_estado()

-- DROP FUNCTION avitour.f_actualizar_estado();

CREATE OR REPLACE FUNCTION avitour.f_actualizar_estado()
  RETURNS boolean AS
$BODY$BEGIN
	UPDATE avitour.reserva SET i_estado = 'CANCELADA' WHERE i_estado = 'VIGENTE' AND (now()-d_fecha) > interval '2 day';
	RETURN TRUE;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.f_actualizar_estado()
  OWNER TO u_avitour;


-- Function: avitour.f_generar_reporte_reserva(numeric)

-- DROP FUNCTION avitour.f_generar_reporte_reserva(numeric);

CREATE OR REPLACE FUNCTION avitour.f_generar_reporte_reserva(fk_reserva numeric)
  RETURNS text AS
$BODY$
DECLARE
	result text;
	pasa avitour.pasajero%ROWTYPE;
	vuelos custom_vuelo;
	nombre text;
	fecha text;
BEGIN
	SELECT n_nombre_1||' '||n_nombre_2||' '||n_apellido_1||' '||n_apellido_2 INTO nombre FROM avitour.usuario, avitour.reserva WHERE avitour.reserva.k_usuario = avitour.usuario.k_usuario AND avitour.reserva.k_reserva = fk_reserva;
	SELECT d_fecha||'' INTO fecha FROM avitour.reserva WHERE k_reserva = fk_reserva;
	result := '<body>';
	result := result||'';
	result := result||'<img src="http://viajesaveturs.com/wp-content/uploads/2015/04/Logo-COLOR-AM.png" alt="" data-ww="295" data-hh="202" style="width: 150px; height: 100px;">';
	result := result||'<label class="msg">Reporte de Reserva</label>';
	result := result||'<label class="texto">Usuario: '||nombre||'</label>';
	result := result||'<label class="texto">Fecha: '||fecha||'</label>';
	result := result||'<div >';
	result := result||'<label class="titulo">Pasajeros </label>';
	result := result||'<TABLE class="tablita"  BORDER=1 >';
	result := result||'<TR>';
	result := result||'<TD>Nombre</TD>';
	result := result||'<TD>Identificacion</TD>';
	result := result||'<TD>Telefono</TD>';
	result := result||'</TR>';

	FOR pasa IN SELECT p.* FROM avitour.pasajero p, avitour.detalle_silla dp WHERE p.k_identificacion = dp.k_identificacion AND dp.k_reserva = fk_reserva LOOP
			result := result||'<TR>';
			result := result||'<TD>'||pasa.n_primer_nombre||' '||pasa.n_segundo_nombre||' '||pasa.n_apellido||'</TD>';
			result := result||'<TD>'||pasa.i_tipo_documento||' '||pasa.k_identificacion||'</TD>';
			result := result||'<TD>'||pasa.n_telefono||'</TD>';
			result := result||'</TR>';
	END LOOP;

	result := result||'</TABLE>';
	result := result||'</div>';
	result := result||'<div>';
	result := result||'<br>';
	result := result||'<label class="titulo">Vuelos </label>';
	result := result||'<TABLE class="tablita"  BORDER=1 >';
	result := result||'<TR>';
	result := result||'<TD>Vuelo</TD>';
	result := result||'<TD>Origen</TD>';
	result := result||'<TD>Destino</TD>';
	result := result||'<TD>Hora de Salida</TD>';
	result := result||'<TD>Hora de llegada</TD>';
	result := result||'<TD>Duracion</TD>';
	result := result||'</TR>';


	FOR vuelos IN SELECT v.k_vuelo AS Id, c.n_nombre AS Origen, c2.n_nombre AS Destino, v.d_fecha_salida AS Salida, v.d_fecha_llegada AS Llegada,age(v.d_fecha_llegada,v.d_fecha_salida) AS Duracion FROM avitour.vuelo v, avitour.ciudad c, avitour.ciudad c2, avitour.reserva_vuelo rv WHERE v.k_ciudad_origen = c.k_ciudad AND v.k_ciudad_destino = c2.k_ciudad AND rv.k_vuelo = v.k_vuelo AND rv.k_reserva = fk_reserva LOOP
		result := result||'<TR>';
		result := result||'<TD>'||vuelos.id||'</TD>';
		result := result||'<TD>'||vuelos.origen||'</TD>';
		result := result||'<TD>'||vuelos.destino||'</TD>';
		result := result||'<TD>'||vuelos.hora_salida||'</TD>';
		result := result||'<TD>'||vuelos.hora_llegada||'</TD>';
		result := result||'<TD>'||vuelos.duracion||'</TD>';
		result := result||'</TR>';
	END LOOP;

	result := result||'</TABLE>';
	result := result||'</div>';
	result := result||'<br>';
	SELECT v_total||'', d_fecha INTO nombre, fecha FROM avitour.reserva WHERE k_reserva = fk_reserva;
	result := result||'<label class="titulo">Costo Total: '||nombre||'</label>';
	result := result||'<label class="titulo">Fecha de Pago: '||fecha||'</label>';
	result := result||'</body>';
	result := result||'</html>';
	result := result||'';
	RETURN result;

EXCEPTION WHEN OTHERS THEN
	raise notice '% %', SQLERRM, SQLSTATE;

END;

$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.f_generar_reporte_reserva(numeric)
  OWNER TO u_avitour;
GRANT EXECUTE ON FUNCTION avitour.f_generar_reporte_reserva(numeric) TO public;
GRANT EXECUTE ON FUNCTION avitour.f_generar_reporte_reserva(numeric) TO u_avitour;
GRANT EXECUTE ON FUNCTION avitour.f_generar_reporte_reserva(numeric) TO r_avitour_use;


-- Function: avitour.f_rol_asociado()

-- DROP FUNCTION avitour.f_rol_asociado();

CREATE OR REPLACE FUNCTION avitour.f_rol_asociado()
  RETURNS name AS
$BODY$DECLARE
	rol name;
BEGIN
	select rolname into rol from pg_user join pg_auth_members on (pg_user.usesysid=pg_auth_members.member) 
	join pg_roles on (pg_roles.oid=pg_auth_members.roleid) 
	where pg_user.usename = current_user;
	RETURN rol;
END
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.f_rol_asociado()
  OWNER TO u_avitour;

-- Function: avitour.tf_actualizar_eestado_reserva()

-- DROP FUNCTION avitour.tf_actualizar_eestado_reserva();

CREATE OR REPLACE FUNCTION avitour.tf_actualizar_eestado_reserva()
  RETURNS trigger AS
$BODY$BEGIN
	UPDATE avitour.reserva SET i_estado='PAGADA' WHERE k_reserva= NEW.k_reserva;
	RETURN NEW;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.tf_actualizar_eestado_reserva()
  OWNER TO u_avitour;

-- Function: avitour.tf_actualizar_valor_total_reserva()

-- DROP FUNCTION avitour.tf_actualizar_valor_total_reserva();

CREATE OR REPLACE FUNCTION avitour.tf_actualizar_valor_total_reserva()
  RETURNS trigger AS
$BODY$DECLARE
	total numeric;
	res avitour.reserva%ROWTYPE;
BEGIN 
	FOR res IN SELECT * FROM avitour.reserva LOOP
		SELECT valor.v_valor*total.pasajeros INTO total FROM (SELECT t.v_valor FROM avitour.tarifa t, avitour.reserva r where t.k_tarifa=r.k_tarifa AND r.k_reserva = res.k_reserva) valor, (SELECT count(*) as pasajeros from avitour.detalle_silla where k_reserva = res.k_reserva) total;
		UPDATE avitour.reserva SET v_total = total WHERE k_reserva = res.k_reserva;
	END LOOP;
	RETURN NEW;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.tf_actualizar_valor_total_reserva()
  OWNER TO u_avitour;

 -- Function: avitour.tf_insertar_registro_actualizacion_reserva()

-- DROP FUNCTION avitour.tf_insertar_registro_actualizacion_reserva();

CREATE OR REPLACE FUNCTION avitour.tf_insertar_registro_actualizacion_reserva()
  RETURNS trigger AS
$BODY$BEGIN
	INSERT INTO avitour.auditoria(n_tabla, n_columna, i_accion, v_valor_anterior, v_valor_nuevo)
	VALUES('reserva','v_total','UPDATE',''||OLD.v_total,''||NEW.v_total);
RETURN NEW;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.tf_insertar_registro_actualizacion_reserva()
  OWNER TO u_avitour;

-- Function: avitour.tf_insertar_registro_reserva_auditoria()

-- DROP FUNCTION avitour.tf_insertar_registro_reserva_auditoria();

CREATE OR REPLACE FUNCTION avitour.tf_insertar_registro_reserva_auditoria()
  RETURNS trigger AS
$BODY$BEGIN
	INSERT INTO avitour.auditoria(n_tabla, n_columna, i_accion, v_valor_nuevo)
	VALUES('reserva','v_total','INSERT',''||NEW.v_total);
RETURN NEW;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION avitour.tf_insertar_registro_reserva_auditoria()
  OWNER TO u_avitour;

-- Trigger: cambio_total_reserva on avitour.reserva

-- DROP TRIGGER cambio_total_reserva ON avitour.reserva;

CREATE TRIGGER cambio_total_reserva
  AFTER UPDATE
  ON avitour.reserva
  FOR EACH ROW
  EXECUTE PROCEDURE avitour.tf_insertar_registro_actualizacion_reserva();

-- Trigger: insersion_reserva on avitour.reserva

-- DROP TRIGGER insersion_reserva ON avitour.reserva;

CREATE TRIGGER insersion_reserva
  AFTER INSERT
  ON avitour.reserva
  FOR EACH ROW
  EXECUTE PROCEDURE avitour.tf_insertar_registro_reserva_auditoria();

-- Trigger: t_actualizar_totales on avitour.reserva_vuelo

-- DROP TRIGGER t_actualizar_totales ON avitour.reserva_vuelo;

CREATE TRIGGER t_actualizar_totales
  AFTER INSERT OR UPDATE
  ON avitour.reserva_vuelo
  FOR EACH ROW
  EXECUTE PROCEDURE avitour.tf_actualizar_valor_total_reserva();

-- Table: avitour.auditoria

-- DROP TABLE avitour.auditoria;

CREATE TABLE avitour.auditoria
(
  n_tabla name NOT NULL,
  k_usuario name NOT NULL DEFAULT "current_user"(),
  d_fecha timestamp with time zone NOT NULL DEFAULT now(),
  i_accion character varying(8) NOT NULL,
  n_columna name NOT NULL,
  v_valor_anterior text,
  v_valor_nuevo text NOT NULL,
  CONSTRAINT ck_concepto_auditoria CHECK (i_accion::text = 'UPDATE'::text OR i_accion::text = 'INSERT'::text)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE avitour.auditoria
  OWNER TO u_avitour;
GRANT ALL ON TABLE avitour.auditoria TO u_avitour;
GRANT INSERT ON TABLE avitour.auditoria TO r_avitour_use;
GRANT SELECT ON TABLE avitour.auditoria TO r_avitour_admin;
