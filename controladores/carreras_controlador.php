<?php

class CarrerasControlador
{

    /*===================================================================*/
    //LISTAR Carreras CON PROCEDURE
    /*===================================================================*/
    static public function ctrListarCarreras()
    {
        $Carreras = CarrerasModelo::mdlListarCarreras();
        return $Carreras;
    }


    /*===================================================================*/
     //REGISTRAR Carreras
     /*===================================================================*/
     static public function ctrRegistrarCarreras($carre_descripcion)
     {
         $registroCarreras = CarrerasModelo::mdlRegistrarCarreras($carre_descripcion);
         return $registroCarreras;
     }


       /*===================================================================*/
     //ACTUALIZAR Carreras
     /*===================================================================*/
    static public function ctrActualizarCarreras($table, $data, $id, $nameId)
    {
        $respuesta = CarrerasModelo::mdlActualizarCarreras($table, $data, $id, $nameId);
        return $respuesta;
    }


    /*===================================================================*/
     //ELIMINAR Carreras
     /*===================================================================*/
     static public function ctrEliminarCarreras($table, $id, $nameId)
     {
 
         $respuesta = CarrerasModelo::mdlEliminarCarreras($table, $id, $nameId);
         return $respuesta;
     }


     /*===================================================================*/
    //LISTAR Carreras EN COMBO DE inventario
    /*===================================================================*/
    static public function ctrListarSelectCarreras()
    {
        $Carreras = CarrerasModelo::mdlListarSelectCarreras();
        return $Carreras;
    }
    
}