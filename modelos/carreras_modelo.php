<?php

require_once "conexion.php";

class CarrerasModelo
{ 

    
    /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE
    =============================================*/
    static public function mdlListarCarreras()
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_CARRERAS()');
        $smt->execute();
        return $smt->fetchAll();
    }


    /*=============================================
    REGISTRAR CARRERAS
    =============================================*/
    static public function mdlRegistrarCarreras($carre_descripcion)
    {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO carreras(carre_descripcion, carre_estado) 
                                                                VALUES (:carre_descripcion, 
                                                                         'Activo')");

            $stmt->bindParam(":carre_descripcion", $carre_descripcion, PDO::PARAM_STR);
           

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
    ACTUALIZAR DATOS DE LA CARRERAS
    =============================================*/
    static public function mdlActualizarCarreras($table, $data, $id, $nameId)
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
    ELIMINAR DATOS DEL CARRERAS
    =============================================*/

    static public function mdlEliminarCarreras($table, $id, $nameId)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
        }
    }


     /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO DE CARRERAS
    =============================================*/
    static public function mdlListarSelectCarreras()
    {

        $stmt = Conexion::conectar()->prepare("SELECT  carre_id, carre_descripcion
                                                FROM carreras 
                                               
                                                order BY carre_id asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
}