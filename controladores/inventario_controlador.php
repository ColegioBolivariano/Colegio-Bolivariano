<?php

class InventarioControlador
{

    /*===================================================================*/
    //LISTAR Carreras CON PROCEDURE
    /*===================================================================*/
    static public function ctrListarInventario($carre_id)
    {
        $Inventario = InventarioModelo::mdlListarInventario($carre_id);
        return $Inventario;
    }

    static public function ctrListarInventarioAdmin()
    {
        $Inventario = InventarioModelo::mdlListarInventarioAdmin();
        return $Inventario;
    }

    

    /*===================================================================*/
    //REGISTRAR INVENTARIO
    /*===================================================================*/
    static public function ctrRegistrarIventario($carre_id, $inv_modulo, $inv_cod_patrimonial, $inv_denominacion, $inv_marca, $inv_modelo, $inv_serie, $inv_color, $inv_estado, $inv_valor, $inv_otros, $inv_observacion, $id_mod_carre)
    {

        $registroInventario = InventarioModelo::mdlRegistrarIventario($carre_id, $inv_modulo, $inv_cod_patrimonial, $inv_denominacion, $inv_marca, $inv_modelo, $inv_serie, $inv_color, $inv_estado, $inv_valor, $inv_otros, $inv_observacion, $id_mod_carre);
        return $registroInventario;
    }

    /*===================================================================*/
    //ACTUALIZAR INVENTARIO
    /*===================================================================*/
    static public function ctrActualizarInventario($table, $data, $id, $nameId)
    {
        $respuesta = InventarioModelo::mdlActualizarInventario($table, $data, $id, $nameId);
        return $respuesta;
    }

    /*===================================================================*/
    //ELIMINAR INVENTARIO
    /*===================================================================*/
    static public function ctrEliminarInventario($table, $id, $nameId)
    {

        $respuesta = InventarioModelo::mdlEliminarInventario($table, $id, $nameId);
        return $respuesta;
    }
}