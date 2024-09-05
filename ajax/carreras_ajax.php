<?php

require_once "../controladores/carreras_controlador.php";
require_once "../modelos/carreras_modelo.php";

class AjaxCarreras
{
    public $carre_descripcion;

    /*===================================================================*/
    //LISTAR EN DATATABLE LAS CARRERAS
    /*===================================================================*/
    public function  getListarCarreras()
    {
        $Carreras = CarrerasControlador::ctrListarCarreras();
        echo json_encode($Carreras);
    }


    /*===================================================================*/
    //REGISTRAR CARRERAS
    /*===================================================================*/
    public function ajaxRegistrarCarreras()
    {
        $registroCarreras = CarrerasControlador::ctrRegistrarCarreras(
            $this->carre_descripcion
        );
        echo json_encode($registroCarreras);
    }


    /*===================================================================*/
    //ACTUALIZAR CARRERAS
    /*===================================================================*/
    public function ajaxActualizarCarreras($data)
    {
        $table = "carreras"; //TABLA
        $id = $_POST["carre_id"]; //LO QUE VIENE DE PHP
        $nameId = "carre_id"; //CAMPO DE LA BASEb

        $respuesta = CarrerasControlador::ctrActualizarCarreras($table, $data, $id, $nameId);

        echo json_encode($respuesta);
    }

    /*===================================================================*/
    //ELIMINAR CARRERAS
    /*===================================================================*/
    public function ajaxEliminarCarreras(){
        $table = "carreras"; //TABLA
        $id = $_POST["carre_id"]; //LO QUE VIENE DE .PHP
        $nameId = "carre_id"; //CAMPO DE LA BASE
        $respuesta = CarrerasControlador::ctrEliminarCarreras($table, $id, $nameId);

        echo json_encode($respuesta);

    }

    /*===================================================================*/
    //LISTAR CARRERAS EN COMBOBOX DE INVENTARIO
    /*===================================================================*/
    public function ListarSelectCarreras()
    {
        $Carreras = CarrerasControlador::ctrListarSelectCarreras();
        echo json_encode($Carreras, JSON_UNESCAPED_UNICODE);
    }
}














/*===================================================================*/
//LISTAR EN DATATABLE LAS CARRERAS
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $Carreras = new AjaxCarreras();
    $Carreras->getListarCarreras();
}

/*===================================================================*/
//PARA REGISTRAR LAS CARRERAS
/*===================================================================*/ 

else if (isset($_POST['accion']) && $_POST['accion'] == 2) {

    $registroCarreras = new AjaxCarreras();
    $registroCarreras->carre_descripcion = $_POST["carre_descripcion"];
    $registroCarreras->ajaxRegistrarCarreras();
}

/*===================================================================*/
//PARA ACTUALIZAR LAS CARRERAS
/*===================================================================*/

else if (isset($_POST['accion']) && $_POST['accion'] == 3) {

    $actualizars = new AjaxCarreras();
    $data = array(
        "carre_descripcion" => $_POST["carre_descripcion"],
    );
    $actualizarCarreras->ajaxActualizarCarreras($data);
}
/*===================================================================*/
//PARA ELIMINAR LAS CARRERAS
/*===================================================================*/ 

else if (isset($_POST['accion']) && $_POST['accion'] == 4) {
    $eliminarCarreras  = new AjaxCarreras();
    $eliminarCarreras->ajaxEliminarCarreras();
}
/*===================================================================*/
//SELECT CARRERAS
/*===================================================================*/ 
else {
    $selectCarreras = new AjaxCarreras();
    $selectCarreras->ListarSelectCarreras(); 

}