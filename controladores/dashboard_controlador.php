<?php


class DashboardControlador {

    /*===================================================================*/
    //TRAER DATOS PARA LAS CAJAS 
    /*===================================================================*/
    static public function ctrListaDashboard(){
        $datos = DashboardModelo::mdlListaDashboard();
        return $datos;
    }



    /*===================================================================*/
    //RESUMEN INVENTARIO
    /*===================================================================*/
    static public function ctrResumenInventario(){
        $ResumenInventario = DashboardModelo::mdlResumenInventario();
        return $ResumenInventario;
    }

}