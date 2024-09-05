<?php

require_once "conexion.php";



class ConfiguracionModelo
{
   

    /*===================================================================*/
    //OBTENER TODOS LOS DATOS DE LA EMPRESA 
    /*===================================================================*/
    static public function mdlObtenerDataEmpresa()
    {
        $smt = Conexion::conectar()->prepare('call SP_OBTENER_DATA_EMPRESA()');
        $smt->execute();
        return $smt->fetch(PDO::FETCH_OBJ);
    }


    
     /*=============================================
    Peticion UPDATE: para ACTUALIZAR DATOS
    =============================================*/
    static public function mdlActualizarConfiguracion($table, $data, $imagen)
    {

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET confi_razon = :confi_razon,  
                                                                        confi_ruc = :confi_ruc,
                                                                        confi_direccion =:confi_direccion,
                                                                        config_correo = :config_correo, 
                                                                       imagen = :imagen
                                                                       ");

            $stmt->bindParam(":confi_razon", $data["confi_razon"], PDO::PARAM_STR);
            $stmt->bindParam(":confi_ruc", $data["confi_ruc"], PDO::PARAM_STR);
            $stmt->bindParam(":confi_direccion", $data["confi_direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":config_correo", $data["config_correo"], PDO::PARAM_STR);
         
            $stmt->bindParam(":imagen",$imagen["nuevoNombre"], PDO::PARAM_STR);
            //var_dump($data["celular"]);

          /* if ($stmt->execute()) {
                $stmt = null;
               */
               
                //GUARDAMOS LA IMAGEN EN LA CARPETA
                if($imagen){
                                
                    $guardarImagen = new ConfiguracionModelo();

                    $guardarImagen->guardarImagen($imagen["folder"], $imagen["ubicacionTemporal"], $imagen["nuevoNombre"]);

                }else {
                    $guardarImagen = new ConfiguracionModelo();

                   
                }

               // $resultado = "ok";
               
                 if ($stmt->execute()) {
                    
                     $resultado = "ok";
                 } else {
                     $resultado = "error";
                    //var_dump($stmt);
                 }
           // } else {
              //  $resultado = "error";
           // }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;

        $stmt = null;


    }

    public function guardarImagen($folder, $ubicacionTemporal, $nuevoNombre){
        file_put_contents(strtolower($folder.$nuevoNombre), file_get_contents($ubicacionTemporal));
    }


    /*===================================================================*/
    //OBTENER CORRELATIVO
    /*===================================================================*/
    static public function mdlObtenerCorrelativo()
    {
        $smt = Conexion::conectar()->prepare('call SP_OBTENER_NRO_CORRELATIVO()');
        $smt->execute();
        return $smt->fetch(PDO::FETCH_OBJ);
    }

}