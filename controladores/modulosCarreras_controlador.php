<?php

class ModulosCarrerasControlador
{

     /*===================================================================*/
    //LISTAR Carreras CON PROCEDURE
    /*===================================================================*/
    static public function ctrListarModulosCarreras()
    {
        $MCarreras = ModulosCarrerasModelo::mdlListarModulosCarreras();
        return $MCarreras;
    }


     /*===================================================================*/
     //REGISTRAR Carreras
     /*===================================================================*/
     static public function ctrRegistrarModulosCarreras($descripcion)
     {
         $registroModulosCarreras = ModulosCarrerasModelo::mdlRegistrarModulosCarreras($descripcion);
         return $registroModulosCarreras;
     }


       /*===================================================================*/
     //ACTUALIZAR Carreras
     /*===================================================================*/
    static public function ctrActualizarModulosCarreras($table, $data, $id, $nameId)
    {
        $respuesta = ModulosCarrerasModelo::mdlActualizarModulosCarreras($table, $data, $id, $nameId);
        return $respuesta;
    }

     /*===================================================================*/
     //ELIMINAR Carreras
     /*===================================================================*/
     static public function ctrEliminarModulosCarreras($table, $id, $nameId)
     {
 
         $respuesta = ModulosCarrerasModelo::mdlEliminarModulosCarreras($table, $id, $nameId);
         return $respuesta;
     }


     
     /*===================================================================*/
    //LISTAR Carreras EN COMBO DE inventario
    /*===================================================================*/
    static public function ctrListarSelectModulos()
    {
        $Modulos = ModulosCarrerasModelo::mdlListarSelectModulos();
        return $Modulos;
    }
    
}