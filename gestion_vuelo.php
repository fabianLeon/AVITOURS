<?php ?>
<html>
    <head>
        <?php
        include ('./templates/importCss.php');
        include('templates/headerAdmin.php');
        include ('controller/vuelos_controller.php');
        include('templates/tabla.php');
        ?>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
        <style type="text/css">
            html { height: 100% }
            body { height: 100%; margin: 0; padding: 0 }
            #map_canvas { height: 100% }
        </style>
        <script type="text/javascript"
                src="http://maps.googleapis.com/maps/api/js?sensor=false">
        </script>
        <script type="text/javascript">
            function initialize(ox, oy, dx, dy) {
                $("#map_canvas").on("shown.bs.modal", function (e) {
                    google.maps.event.trigger(map, "resize");
                    return map.setCenter(markerLatLng);

                });
                var myOptions = {
                    center: new google.maps.LatLng(((ox+dx)/2),((oy+dy)/2)),
                    zoom: 5,
                    //mapTypeId: google.maps.MapTypeId.SATELLITE,
                    zoomControl: false,
                    scaleControl: false

                };
                var map = new google.maps.Map(document.getElementById("map_canvas"),
                        myOptions);

                gozilla3 = new google.maps.Marker({
                    position: new google.maps.LatLng(ox, oy),
                    icon: 'http://www.google.com/mapfiles/marker.png',
                    map: map,
                    title: 'avion'
                });
                gozilla = new google.maps.Marker({
                    position: new google.maps.LatLng(dx, dy),
                    icon: 'http://www.google.com/mapfiles/marker.png',
                    map: map,
                    title: 'avion'
                });
                var ruta = [
                    new google.maps.LatLng(ox, oy),
                    new google.maps.LatLng(dx, dy)
                ];

                var lineas = new google.maps.Polyline({
                    path: ruta,
                    map: map,
                    strokeColor: '#000000',
                    strokeWeight: 4,
                    strokeOpacity: 0.8,
                    clickable: false
                });
            }

        </script>
    </head>
    <body>  
        <div class="container">
            <div class="wrapper">
                <div class="col-sm-8 col-sm-offset-2">

                    <div class="panel-heading"><h2>Gesti&oacute;n de Vuelos</h2></div>
                    <div class="panel panel-warning" >
                        <div class="panel-body">
                            <form class="form-signin" name="vuelos" id="vuelos" method = "POST" action = controller/insertar_vuelo_controller.php>    


                                <div class="col-sm-6">
                                    <div class="col-sm-6">
                                        <label>Fecha de Salida</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="fecha_salida" name="fecha_salida" required=""/>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Fecha de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="date" class="form-control" id="fecha_llegada" name="fecha_llegada" required=""/>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Hora de Salida</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="time" class="form-control"   id="hora_salida" name="hora_salida" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <label>Hora de Llegada</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <br>
                                        <input type="time" class="form-control"   id="hora_llegada" name="hora_llegada" required="">

                                    </div>


                                </div>

                                <div class="col-sm-6 ">
                                    <div class="col-sm-6">
                                        <label>Ciudad Origen</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="ciudad_origen">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudades as $ciudad) { ?>
                                                <option id= '<?php echo $ciudad[0] ?>'> <?php echo $ciudad[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>


                                    <div class="col-sm-6">
                                        <label>Ciudad Destino</label><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="ciudad_destino">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($ciudades as $ciudad) { ?>
                                                <option id= '<?php echo $ciudad[0] ?>'> <?php echo $ciudad[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Avion</label><br>
                                    </div>

                                    <div class="col-sm-6">
                                        <select class="form-control" name="avion">
                                            <option>Seleccione ... </option>
                                            <?php foreach ($aviones as $avion) { ?>
                                                <option id= '<?php echo $avion[0] ?>'> <?php echo $avion[1] ?> </option>
                                            <?php } ?>
                                        </select>
                                        <br>
                                    </div>

                                    <div class="col-lg-12 text-center">
                                        <div id="success"></div>
                                        <button type="submit" class="btn btn-xl">Nuevo Vuelo</button>
                                    </div>  

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="col-sm-6">
                <div class="panel-heading"><h2>Listado</h2></div>
                <?php
                $titulos = ["ID", "Origen", "Destino", "Fecha Salida", "Fecha LLegada", "Duracion", ];
                $tabla = new Tabla($titulos, $tablaVuelosGuardados);
                $tabla->escribirRegistros3();
                echo ($tabla->getTabla());
                ?>
            </div>
            <div class="col-sm-6">
                <div class="panel-heading"><h2>Mapa</h2></div>
                <div class="panel panel-warning" >
                    <div class="panel-body">
                        <div id="map_canvas" style="width:100%; height:60%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->

</body>
</html>
