<?php

require_once "conexion.php";

class InventarioModelo
{

    /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE
    =============================================*/
    static public function mdlListarInventario($carre_id)
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_INVENTARIO(:carre_id)');
        $smt->bindParam(":carre_id", $carre_id, PDO::PARAM_STR);
        $smt->execute();
        return $smt->fetchAll();
    }

    static public function mdlListarInventarioAdmin()
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_INVENTARIO_ADMIN()');
        $smt->execute();
        return $smt->fetchAll();
    }


    /*=============================================
    REGISTRAR INVENTARIO
    =============================================*/
    static public function mdlRegistrarIventario($carre_id, $inv_modulo, $inv_cod_patrimonial, $inv_denominacion, $inv_marca, $inv_modelo, $inv_serie, $inv_color, $inv_estado, $inv_valor, $inv_otros, $inv_observacion, $id_mod_carre)
    {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO inventario(carre_id, 
                                                                            inv_modulo,
                                                                            inv_cod_patrimonial,
                                                                            inv_denominacion,inv_marca,inv_modelo,inv_serie, inv_color,inv_estado , inv_valor, inv_otros,inv_observacion, inv_fecha, id_mod_carre ) 
                                                                VALUES (    :carre_id, 
                                                                            :inv_modulo,
                                                                            :inv_cod_patrimonial,
                                                                            :inv_denominacion,
                                                                            :inv_marca,
                                                                            :inv_modelo,
                                                                            :inv_serie, 
                                                                            :inv_color,
                                                                            :inv_estado , 
                                                                            :inv_valor, 
                                                                            :inv_otros,
                                                                            :inv_observacion ,
                                                                            CURRENT_TIME(), 
                                                                            :id_mod_carre)");

            $stmt->bindParam(":carre_id", $carre_id, PDO::PARAM_STR);
            $stmt->bindParam(":inv_modulo", $inv_modulo, PDO::PARAM_STR);
            $stmt->bindParam(":inv_cod_patrimonial", $inv_cod_patrimonial, PDO::PARAM_STR);
            $stmt->bindParam(":inv_denominacion", $inv_denominacion, PDO::PARAM_STR);
            $stmt->bindParam(":inv_marca", $inv_marca, PDO::PARAM_STR);
            $stmt->bindParam(":inv_modelo", $inv_modelo, PDO::PARAM_STR);
            $stmt->bindParam(":inv_serie", $inv_serie, PDO::PARAM_STR);
            $stmt->bindParam(":inv_color", $inv_color, PDO::PARAM_STR);
            $stmt->bindParam(":inv_estado", $inv_estado, PDO::PARAM_STR);
            $stmt->bindParam(":inv_valor", $inv_valor, PDO::PARAM_STR);
            $stmt->bindParam(":inv_otros", $inv_otros, PDO::PARAM_STR);
            $stmt->bindParam(":inv_observacion", $inv_observacion, PDO::PARAM_STR);
            $stmt->bindParam(":id_mod_carre", $id_mod_carre, PDO::PARAM_STR);



            if ($stmt->execute()) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;

        $stmt = null;
    }


    /*=============================================
    ACTUALIZAR DATOS DE LA INVENTARIO
    =============================================*/
    static public function mdlActualizarInventario($table, $data, $id, $nameId)
    {

        $set = "";

        foreach ($data as $key => $value) {
            $set .= $key . " = :" . $key . ","; //DEPENDE DEL ARRAY QUE VIENE DEL AJAX
        }

        $set = substr($set, 0, -1); //QUITA LA COMA

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {
            $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
        }

        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {

            return Conexion::conectar()->errorInfo();
        }
    }


    /*=============================================
    ELIMINAR DATOS DEL INVENTARIO
    =============================================*/

    static public function mdlEliminarInventario($table, $id, $nameId)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
        }
    }
}