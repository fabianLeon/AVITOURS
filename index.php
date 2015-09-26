<!DOCTYPE html>
<html lang="en">

    <?php
    include './templates/importCss.php';
    include('./templates/headerIndex.php');
    ?>
    <body id="page-top" class="index">

        <!-- Navigation -->


        <!-- Header -->
        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-heading">Desea Reservar ?</div>
                    <a href="#registro" class="page-scroll btn btn-xl">Reservar</a>
                </div>
            </div>
        </header>


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

        <?php
        include './templates/importJS.php';
        ?>
    </body>

</html>
