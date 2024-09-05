<?php

require_once "conexion.php";
class DashboardModelo {
    

    /*===================================================================*/
    //TRAER DATOS PARA LAS CAJAS 
    /*===================================================================*/
    static public function mdlListaDashboard(){
        $smt = Conexion::conectar()->prepare('call SP_DATOS_DASHBOARD()');
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }



     /*===================================================================*/
    //RESUMEN INVENTARIO
    /*===================================================================*/
    static public function mdlResumenInventario(){
        $smt = Conexion::conectar()->prepare('call SP_RESUMEN_INVENTARIO()');
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
    }


}