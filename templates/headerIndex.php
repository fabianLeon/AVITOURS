<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Avitours</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#registro">Registro</a>
                </li>
                <li>
                    <form class="navbar-form navbar-left" role="search" action="controller/session_controller.php">
                        <div class="form-group">
                            <input style="width: 120px" type="text" name="db_user" id="db_user" class="form-control" placeholder="Usuario">
                            <input style="width: 120px" type="password" name="db_pass" id="db_pass" class="form-control" placeholder="Contrase&ntilde;a">
                        </div>
                        <button type="submit" class="btn btn-warning">Ingresar</button>
                    </form>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
