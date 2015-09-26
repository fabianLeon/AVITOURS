<nav class = "navbar navbar-inverse">
    <div class = "container-fluid">
        <!--Brand and toggle get grouped for better mobile display -->
        <div class = "navbar-default">

            <a class="navbar-brand" href="home.php">Avitours</a>

            <!--Collect the nav links, forms, and other content for toggling -->
            <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
                <ul class = "nav navbar-nav navbar-right">

                    <li class = "dropdown">
                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            Reservas<span class = "caret"></span>
                        </a>
                        <ul class = 'dropdown-menu' role = menu>
                        <li><a href = 'buscar.php'>Consultar Reservas</a></li>
                        </ul>
                    </li>

                    <li class = "dropdown">

                        <a href = "#" class = "dropdown-toggle" data-toggle = "dropdown">
                            <span class='glyphicon glyphicon-user' aria-hidden='true'></span>

                                <?php
                                    echo(" ");
                                    echo("nombre");
                                    echo(" ");
                                    echo("apellido");
                                    echo( "correo");
//                                echo(" ");
//                                echo($_SESSION['nombre']);
//                                echo(" ");
//                                echo($_SESSION['apellido']);
//                                echo( "<small> " . $_SESSION['correo'] . "</small>");
                                ?><span class = "caret"></span>
                        </a>
                        <ul class = "dropdown-menu" role = "menu">
                            <li><a href = "index.php"><strong>Cerrar Sesi&oacute;n</strong></a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.navbar-collapse -->
        </div><!--/.container-fluid -->
</nav>