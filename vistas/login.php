<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link rel="stylesheet" href="vistas/assets/login/css/bootstrap.css"> -->
    <link rel="stylesheet" href="vistas/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="vistas/assets/login/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
 
    <!-- <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon"> -->
    <title>Inicio de sesión</title>
</head>

<body>
    <img class="wave" src="vistas/assets/login/img/wave.png">
    <div class="container">
        <div class="img">
            <!-- <img src="vistas/assets/login/img/bg.svg"> -->
            <img src="">
        </div>
        <div class="login-content">
            <form method="POST" class="needs-validation-login" novalidate >
                <img src="vistas/assets/login/img/logo_tecno.png">
                <h3 class="title">BIENVENIDO</h3>
                <!-- AQUI VA EL MENSAJE DE ERROR -->
                    <!-- <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                        <small>mensaje de error</small>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> -->                
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h4>Usuario</h4>
                        <input id="loginUsuario" type="text"
                            class="input" name="loginUsuario"
                            title="ingrese su nombre de usuario" autocomplete="usuario" value="">


                    </div>
                </div>
                <div class="invalid-feedback">Debe ingresar su usuario!</div>

                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h4>Clave</h4>
                        <input type="password" id="input" class="input"
                        name="loginPassword" title="ingrese su Clave" autocomplete="current-password">


                    </div>
                </div>
                <div class="invalid-feedback">Debe ingresar su contraseña!</div>
                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>

                <div class="row">

                        <?php

                        $login = new UsuarioControlador();
                        $login->login();

                        ?>

                        <div class="col-md-12 text-center">

                            <!-- <button type="submit" class="btn btn-info">Iniciar Sesion</button> -->
                            <input name="btningresar" class="btn" title="click para ingresar" type="submit" value="INICIAR SESION">

                        </div>

                    </div>


                <!-- <div class="text-center">
                    <a class="font-italic isai5" href="">Olvidé mi contraseña</a>
                </div> -->
                <!-- <input name="btningresar" class="btn" title="click para ingresar" type="submit"  value="INICIAR SESION">-->
            </form>
        </div>
    </div>
    <!-- <script src="vistas/assets/login/js/fontawesome.js"></script> -->
    <script src="vistas/assets/login/js/main.js"></script>
    <script src="vistas/assets/login/js/main2.js"></script>
    <!-- <script src="vistas/assets/login/js/jquery.min.js"></script> -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="vistas/assets/login/js/bootstrap.js"></script> -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>
    <!-- <script src="vistas/assets/login/js/bootstrap.bundle.js"></script> -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
