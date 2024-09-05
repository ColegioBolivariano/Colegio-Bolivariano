<?php

require_once "conexion.php";

class ModulosCarrerasModelo
{


    /*=============================================
    Peticion LISTAR PARA MOSTRAR DATOS EN DATATABLE CON PROCEDURE
    =============================================*/
    static public function mdlListarModulosCarreras()
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_mod_carre, descripcion, estado, '' as opcion 
                                                 FROM moduloscarrera			
                                                 ORDER BY descripcion asc");

        $stmt->execute();

        return $stmt->fetchAll();
    }


    /*=============================================
    REGISTRAR CARRERAS
    =============================================*/
    static public function mdlRegistrarModulosCarreras($descripcion)
    {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO moduloscarrera(descripcion, estado) 
                                                                VALUES (:descripcion, 
                                                                         '1')");

            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);


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
    static public function mdlActualizarModulosCarreras($table, $data, $id, $nameId)
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

    static public function mdlEliminarModulosCarreras($table, $id, $nameId)
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
    static public function mdlListarSelectModulos()
    {

        $stmt = Conexion::conectar()->prepare("SELECT  id_mod_carre,descripcion
                                                FROM moduloscarrera 
                                               
                                                order BY id_mod_carre asc");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
