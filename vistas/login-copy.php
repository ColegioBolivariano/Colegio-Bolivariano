<div id="wrapper-1" style="display: block;">
<link href="vistas/assets/style.css" id="theme" rel="stylesheet">

    <div class="row auth-wrapper gx-0">
    <div class="col-lg-7 col-xl-8 bg-primary auth-box-2 on-sidebar hidden-md-down" style="background-image:url('vistas/assets/img/fondo.jpg'); background-size: cover;">
        </div>
        <div class="col-md-12 col-lg-5 col-xl-4 d-flex align-items-center justify-content-center">
    <div class="row justify-content-center w-100 mt-1 mt-lg-0 px-5">
        <div class="col-12">
            <div id="loginform">
                <img src="vistas/assets/img/logo_tecno.png" style="width: 65%; max-width: 350px; margin: auto; display: block;" class="mb-2"/>
                <h3 class="text-center">Bienvenido!</h3>
                <p class="text-center text-muted fs-4">Ingrese sus datos de acceso</p>
                <form class="form-horizontal pt-2 needs-validation-login" id="frm-login" role="form" method="post" novalidate>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-input-bg" name="loginUsuario" id="loginUsuario" placeholder="Usuario" autocomplete="off">
                        <label for="loginUsuario">Usuario</label>
                        <div class="invalid-feedback">Debe ingresar su usuario!</div>
                    </div>
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control form-input-bg" name="loginPassword" id="loginPassword" placeholder="*****" autocomplete="off">
                        <label for="loginPassword">Contrase&ntilde;a</label>
                        <div class="invalid-feedback">Debe ingresar su contraseña!</div>
                        <div class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
                            <i class="fas fa-eye" id="togglePassword"></i>
                        </div>
                    </div>
                    <div class="button-group px-2">
                        <button type="submit" name="btningresar" class="btn btn-warning btn-block btn-lg px-4">Continuar</button>
                    </div>
                    <div class="row">
                        <?php
                        $login = new UsuarioControlador();
                        $login->login();
                        ?>
                       
                    </div>
                </form>
            </div>
            <div class="text-center" style="font-size: 12px;">©2024 Sistema de Monitoreo │ Todos los Derechos Reservados UNAP "FINESI"</div>
        </div>
    </div>
</div>
    </div>
</div>
<script>
document.getElementById('togglePassword').addEventListener('click', function (e) {
    const passwordInput = document.getElementById('loginPassword');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash');
});
</script>
<script src="vistas/assets/login/js/main.js"></script>
    <script src="vistas/assets/login/js/main2.js"></script>
    <!-- <script src="vistas/assets/login/js/jquery.min.js"></script> -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- <script src="vistas/assets/login/js/bootstrap.js"></script> -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>
    <!-- <script src="vistas/assets/login/js/bootstrap.bundle.js"></script> -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<style>
    .text-warning {
    color: #ea5b5d !important;
}
.btn-warning {
    color: #fff !important;
    background-color: #ea5b5d !important;
    border-color: #ea5b5d !important;
    box-shadow: 0 1px 0 rgb(255 255 255 / 15%);
}
.btn-warning:hover, .btn-warning.disabled:hover {
    background: #ea5b5d !important;
    color: #ffffff !important;
    -webkit-box-shadow: 0 14px 26px -12px rgb(234 91 93 / 42%), 0 4px 23px 0 rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(234 91 93 / 20%);
    box-shadow: 0 14px 26px -12px rgb(234 91 93 / 42%), 0 4px 23px 0 rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(234 91 93 / 20%);
    border: 1px solid #ea5b5d !important;
}
@media (max-width: 767px) {

    .auth-wrapper .auth-box-2 {
    padding: 15px 25px 0px 25px;
}
}
</style>