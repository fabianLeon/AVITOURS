<nav class = "navbar navbar-inverse">
    <div class = "container-fluid">
        <!--Brand and toggle get grouped for better mobile display -->
        <div class = "navbar-default">
            
            <a class="navbar-brand page-scroll" href="index.php">
                 <img style="max-width:215px; margin-top: -15px; margin-left: -7%;" src="img/Logo-COLOR-AM.png">
            </a>
            <a class="navbar-brand page-scroll" href="index.php">
                Administraci&oacute;n
            </a>

            <!--Collect the nav links, forms, and other content for toggling -->
            <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
                <ul class = "nav navbar-nav navbar-right">
                    
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            Gesti&oacute;n<span class = "caret"></span>
                        </a>
                        <ul class = 'dropdown-menu' role = menu>
                            <li><a href = ''>Vuelos</a></li>
                            <li><a href = ''>Aviones</a></li>
                            <li><a href = ''>Tarifas</a></li>
                            <li><a href = 'ciudad.php'>Ciudades</a></li>
                        </ul>
                    </li>
                    
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            RESERVAS<span class = "caret"></span>
                        </a>
                        <ul class = 'dropdown-menu' role = menu>
                            <li><a href = 'reservas.php'>Ver Reservas</a></li>
                        </ul>
                    </li>
                    
                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            ESTADISTICAS<span class = "caret"></span>
                        </a>
                        <ul class = 'dropdown-menu' role = menu>
                            <li><a href = 'estadisticas.php'>Estadisticas</a></li>
                        </ul>
                    </li>

                    <li class = "dropdown">
                        <?php
                        session_start();
                        if ($_SESSION['db_user'] == 'u_avitour_consulta') {
                            ?>
                            <form class="navbar-form navbar-left" method="GET" action="controller/session_controller.php">
                                <div class="form-group">
                                    <input style="width: 120px" type="text" name="db_user" id="db_user" class="form-control" placeholder="Usuario">
                                    <input style="width: 120px" type="password" name="db_pass" id="db_pass" class="form-control" placeholder="Contrase&ntilde;a">
                                </div>
                                <button type="submit" class="btn btn-warning">Ingresar</button>
                            </form>
                        <?php } else { ?>
                            <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                                <span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                                <span class = "caret"></span>
                                <?php echo($_SESSION['db_user']); ?>
                            </a>
                            <ul class = "dropdown-menu" role = "menu">
                                <li><a href = "index.php"><strong>Cerrar Sesi&oacute;n</strong></a></li>
                            </ul>
                        <?php } ?>
                    </li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div><!--/.container-fluid -->
</nav>