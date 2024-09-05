<?php
require_once "../controladores/configuracion_controlador.php";
require_once "../modelos/configuracion_modelo.php";
require_once "../vendor/autoload.php";

class AjaxConfiguracion
{

    /*===================================================================*/
    //OBTENER TODOS LOS DATOS DE LA EMPRESA 
    /*===================================================================*/
    public function ajaxObtenerData(){
        $DataEmpresa = ConfiguracionControlador::ctrObtenerDataEmpresa();
        echo json_encode($DataEmpresa, JSON_UNESCAPED_UNICODE);
    }



    /*===================================================================*/
    //ACTUALIZAR DATOS DE LA EMPRESA
    /*===================================================================*/
    public function ajaxActualizarConfiguracion($data,  $imagen = null)
    {
        $table = "empresa"; //TABLA
        $id = $_POST["confi_id"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "confi_id"; //CAMPO DE LA BASEbien bebe

        $respuesta = ConfiguracionControlador::ctrActualizarConfiguracion($table, $data,  $imagen );

        echo json_encode($respuesta);
    }


    /*===================================================================*/
    //OBTENER CORRELATIVO
    /*===================================================================*/
    public function ajaxObtenerCorrelativo(){
        $correlativo = ConfiguracionControlador::ctrObtenerCorrelativo();
        echo json_encode($correlativo, JSON_UNESCAPED_UNICODE);
    }
}



//instanciamos para que se ejecute la funcion
if (isset($_POST['accion']) && $_POST['accion'] == 1) {    //OBTENER TODOS LOS DATOS DE LA EMPRESA 
    $DataEmpresa = new AjaxConfiguracion();
    $DataEmpresa->ajaxObtenerDataEmpresa(); //creamos el metodo

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) {       //ACTUALIZAR DATOS DE LA EMPRESA

    //$actualizarConfig = new AjaxConfiguracion();
    $data = array(
        "confi_razon" => $_POST["confi_razon"],
        "confi_ruc" => $_POST["confi_ruc"],
        "confi_direccion" => $_POST["confi_direccion"],
       
        "config_correo" => $_POST["config_correo"]
      

    );
    if(isset($_FILES["archivo"]["name"])){

        $imagen["ubicacionTemporal"] =  $_FILES["archivo"]["tmp_name"][0];

        //capturamos el nombre de la imagen
        $info = new SplFileInfo($_FILES["archivo"]["name"][0]);

        //generamos un nombre aleatorio y unico para la imagen
        $imagen["nuevoNombre"] = sprintf("%s_%d.%s", uniqid(), rand(100,999), $info->getExtension());

        $imagen["folder"] = '../vistas/assets/img/empresa/';

        $actualizarConfig = new AjaxConfiguracion();
        $actualizarConfig->ajaxActualizarConfiguracion($data, $imagen);


    }else{
        $actualizarConfig = new AjaxConfiguracion();
        $actualizarConfig->ajaxActualizarConfiguracion($data);
    }
   





}else if (isset($_POST['accion']) && $_POST['accion'] == 3) {   //OBTENER CORRELATIVO
    $correlativo = new AjaxConfiguracion();
    $correlativo->ajaxObtenerCorrelativo(); //creamos el metodo

}
