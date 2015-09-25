<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AVITOURS</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <?php include('templates/header.php'); ?>

        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">Desea Reservar ?</div>
                    <a href="#reserva" class="page-scroll btn btn-xl">Reservar</a>
                </div>
            </div>
        </header>


        <!-- About Section -->
        <section id="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Registro</h2>
                        <h3 class="section-subheading text-muted">Bienvenido, espero que podamos servirte.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">E-Commerce</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">Responsive Design</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="service-heading">Web Security</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients Aside -->
        <aside class="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="img/logos/envato.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="img/logos/designmodo.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="img/logos/themeforest.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <a href="#">
                            <img src="img/logos/creative-market.jpg" class="img-responsive img-centered" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Registro Section -->
        <section id="registro">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Registro</h2>
                        <h3 class="section-subheading text-muted">Cuenta con nosotros, Viaja con nosotros.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form name="sentMessage" id="contactForm" novalidate>
                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Primer Nombre *" name="nombre1" id="nombre1" required data-validation-required-message="Porfavor Ingrese Su primer Nombre.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Primer Apellido *" name="apellido1" id="apellido1" required data-validation-required-message="Porfavor Ingrese Su primer apellido.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Correo Electronico *" name="apellido1" id="apellido1"required data-validation-required-message="Ingrese su apellido.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" id="phone" required data-validation-required-message="ingrese su password.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Segundo Nombre " name="nombre2" id="nombre2">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="segundo Apellido" name="apellido2" id="apellido1" >
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" class="form-control" placeholder="Telefono *" id="phone" required data-validation-required-message="Ingrese su telefono.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="confirme su Password *" id="phone" required data-validation-required-message="Confirme su password">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Your Website 2014</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Privacy Policy</a>
                            </li>
                            <li><a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Portfolio Modals -->
        <!-- Use the modals below to showcase details about your portfolio projects! -->

       

        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/cbpAnimatedHeader.js"></script>
        <!-- Contact Form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/contact_me.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="js/agency.js"></script>

    </body>

</html>
