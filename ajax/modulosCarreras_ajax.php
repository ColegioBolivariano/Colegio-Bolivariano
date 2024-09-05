<?php

require_once "../controladores/modulosCarreras_controlador.php";
require_once "../modelos/modulosCarreras_modelo.php";

class AjaxModulosCarreras
{ 
    public $descripcion;

     /*===================================================================*/
    //LISTAR EN DATATABLE LAS MODULOS
    /*===================================================================*/
    public function  getListarModulosCarreras()
    {
        $MCarreras = ModulosCarrerasControlador::ctrListarModulosCarreras();
        echo json_encode($MCarreras);
    }

    

     /*===================================================================*/
    //REGISTRAR MODULOS
    /*===================================================================*/
    public function ajaxRegistrarModulosCarreras()
    {
        $registroModulosCarreras = ModulosCarrerasControlador::ctrRegistrarModulosCarreras(
            $this->descripcion
        );
        echo json_encode($registroModulosCarreras);
    }


    /*===================================================================*/
    //ACTUALIZAR MODULOS
    /*===================================================================*/
    public function ajaxActualizarModulosCarreras($data)
    {
        $table = "moduloscarrera"; //TABLA
        $id = $_POST["id_mod_carre"]; //LO QUE VIENE DE PHP
        $nameId = "id_mod_carre"; //CAMPO DE LA BASEb

        $respuesta = ModulosCarrerasControlador::ctrActualizarModulosCarreras($table, $data, $id, $nameId);

        echo json_encode($respuesta);
    }

    /*===================================================================*/
    //ELIMINAR MODULOS
    /*===================================================================*/
    public function ajaxEliminarModulosCarreras(){
        $table = "moduloscarrera"; //TABLA
        $id = $_POST["id_mod_carre"]; //LO QUE VIENE DE .PHP
        $nameId = "id_mod_carre"; //CAMPO DE LA BASE
        $respuesta = ModulosCarrerasControlador::ctrEliminarModulosCarreras($table, $id, $nameId);

        echo json_encode($respuesta);

    }

     /*===================================================================*/
    //LISTAR CARRERAS EN COMBOBOX DE INVENTARIO
    /*===================================================================*/
    public function ListarSelectModulos()
    {
        $Modulos = ModulosCarrerasControlador::ctrListarSelectModulos();
        echo json_encode($Modulos, JSON_UNESCAPED_UNICODE);
    }


}




/*===================================================================*/
//LISTAR EN DATATABLE LAS MODULOS
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $MCarreras = new AjaxModulosCarreras();
    $MCarreras->getListarModulosCarreras();
}


else if (isset($_POST['accion']) && $_POST['accion'] == 2) {

    $registroModulosCarreras = new AjaxModulosCarreras();
    $registroModulosCarreras->descripcion = $_POST["descripcion"];
    $registroModulosCarreras->ajaxRegistrarModulosCarreras();
}

/*===================================================================*/
//PARA ACTUALIZAR LAS MODULOS
/*===================================================================*/

else if (isset($_POST['accion']) && $_POST['accion'] == 3) {

    $actualizarModulosCarreras = new AjaxModulosCarreras();
    $data = array(
        "descripcion" => $_POST["descripcion"],
    );
    $actualizarModulosCarreras->ajaxActualizarModulosCarreras($data);
}
/*===================================================================*/
//PARA ELIMINAR LAS MODULOS
/*===================================================================*/ 

else if (isset($_POST['accion']) && $_POST['accion'] == 4) {
    $eliminarMCarreras  = new AjaxModulosCarreras();
    $eliminarMCarreras->ajaxEliminarModulosCarreras();
}

/*===================================================================*/
//SELECT CARRERAS
/*===================================================================*/ 
else {
    $selectModulos = new AjaxModulosCarreras();
    $selectModulos->ListarSelectModulos(); 

}