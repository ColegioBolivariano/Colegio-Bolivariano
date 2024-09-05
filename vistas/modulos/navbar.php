<!-- Navbar -->
<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor:pointer;" class="nav-link" onclick="CargarContenido('vistas/dashboard.php','content-wrapper')">
                Dashboar
            </a>
        </li>
    </ul>
</nav> -->
<!-- /.navbar -->



<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">



        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge" id="lbl_contador">1</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div id="div_cuerpo">

                </div>



                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Cuotas Pendientes por Pagar</a>
            </div>
        </li> -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">

                <!-- llamamos el nombre del usuario (sesion ya creada) -->
                <?php echo $_SESSION["usuario"]->usuario  ?> <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item" style="font-size:large;" onclick="cargar_contenido('contenido_principal','usuario/mantenimiento_perfil.php')">
                    <i class="fas fa-user-cog mr-2"></i>
                    <span class="text-muted text-sm">Perfil</span>
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="http://localhost/Bolivariano_56008/?cerrar_sesion=1" class="dropdown-item" style="font-size:large;">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span class="text-muted text-sm">Cerrar Sesion</span>
                </a>
                <div class="dropdown-divider"></div>

            </div>
        </li>


        

        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>

<script>
$(document).ready(function() {
   



})


</script>