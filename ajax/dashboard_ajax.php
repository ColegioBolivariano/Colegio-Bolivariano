<?php
require_once "../controladores/dashboard_controlador.php";
require_once "../modelos/dashboard_modelo.php";

class AjaxDashboard
{

    /*===================================================================*/
    //TRAER DATOS PARA LAS CAJAS 
    /*===================================================================*/
    public function getDatosDashboard()
    {
        $datos = DashboardControlador::ctrListaDashboard();
        echo json_encode($datos);
    }



    /*===================================================================*/
    //RESUMEN DE INVENTARIO
    /*===================================================================*/
    public function getResumenInventario()
    {
        $ResumenInventario = DashboardControlador::ctrResumenInventario();
        echo json_encode($ResumenInventario);
    }


    
}

 if (isset($_POST['accion']) && $_POST['accion'] == 2) {   
    $ResumenInventario = new AjaxDashboard();//clase
    $ResumenInventario->getResumenInventario();


}   else {
    $datos = new AjaxDashboard();        //TRAER DATOS PARA LAS CAJAS 
    $datos->getDatosDashboard();
}
