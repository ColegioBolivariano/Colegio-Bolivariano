<?php

require_once "../controladores/inventario_controlador.php";
require_once "../modelos/inventario_modelo.php";

class AjaxInventario
{
    public $carre_id;
    public $inv_modulo;
    public $inv_cod_patrimonial;
    public $inv_denominacion;
    public $inv_marca;
    public $inv_modelo;
    public $inv_serie;
    public $inv_color;
    public $inv_estado;
    public $inv_valor;
    public $inv_otros;
    public $inv_observacion;
    public $id_mod_carre;

    /*===================================================================*/
    //LISTAR EN DATATABLE LAS Inventario
    /*===================================================================*/
  
    public function  getListarInventarioAdmin()
    {
        $Inventario = InventarioControlador::ctrListarInventarioAdmin();
        echo json_encode($Inventario);
    }

    
    

    /*===================================================================*/
    //REGISTRAR INVENTARIO
    /*===================================================================*/
    public function ajaxRegistrarIventario()
    {
        $registroInventario = InventarioControlador::ctrRegistrarIventario(
            $this->carre_id,
            $this->inv_modulo,
            $this->inv_cod_patrimonial,
            $this->inv_denominacion,
            $this->inv_marca,
            $this->inv_modelo,
            $this->inv_serie,
            $this->inv_color,
            $this->inv_estado,
            $this->inv_valor,
            $this->inv_otros,
            $this->inv_observacion,
            $this->id_mod_carre

        );
        echo json_encode($registroInventario);
    }


    /*===================================================================*/
    //ACTUALIZAR INVENTARIO
    /*===================================================================*/
    public function ajaxActualizarInventario($data)
    {
        $table = "inventario"; //TABLA
        $id = $_POST["inv_id"]; //LO QUE VIENE DE PHP
        $nameId = "inv_id"; //CAMPO DE LA BASE

        $respuesta = InventarioControlador::ctrActualizarInventario($table, $data, $id, $nameId);

        echo json_encode($respuesta);
    }

    /*===================================================================*/
    //ELIMINAR INVENTARIO
    /*===================================================================*/
    public function ajaxEliminarInventario()
    {
        $table = "inventario"; //TABLA
        $id = $_POST["inv_id"]; //LO QUE VIENE DE PHP
        $nameId = "inv_id"; //CAMPO DE LA BASE
        $respuesta = InventarioControlador::ctrEliminarInventario($table, $id, $nameId);

        echo json_encode($respuesta);
    }
}



/*===================================================================*/
//LISTAR EN DATATABLE Inventario
/*===================================================================*/


if (isset($_POST['accion']) && $_POST['accion'] == 1) {
    $Inventario = new AjaxInventario();
    $Inventario->getListarInventarioAdmin();
}


/*===================================================================*/
//PARA REGISTRAR  INVENTARIO
/*===================================================================*/ else if (isset($_POST['accion']) && $_POST['accion'] == 2) {
    $registroInvent = new AjaxInventario();
    $registroInvent->carre_id = $_POST["carre_id"];
    $registroInvent->inv_modulo = $_POST["inv_modulo"];
    $registroInvent->inv_cod_patrimonial = $_POST["inv_cod_patrimonial"];
    $registroInvent->inv_denominacion = $_POST["inv_denominacion"];
    $registroInvent->inv_marca = $_POST["inv_marca"];
    $registroInvent->inv_modelo = $_POST["inv_modelo"];
    $registroInvent->inv_serie = $_POST["inv_serie"];
    $registroInvent->inv_color = $_POST["inv_color"];
    $registroInvent->inv_estado = $_POST["inv_estado"];
    $registroInvent->inv_valor = $_POST["inv_valor"];
    $registroInvent->inv_otros = $_POST["inv_otros"];
    $registroInvent->inv_observacion = $_POST["inv_observacion"];
    $registroInvent->id_mod_carre = $_POST["id_mod_carre"];

    $registroInvent->ajaxRegistrarIventario();
}



/*===================================================================*/
//PARA ACTUALIZAR  INVENTARIO
/*===================================================================*/ else if (isset($_POST['accion']) && $_POST['accion'] == 3) {
    $actualizarInventario = new AjaxInventario();
    $data = array(
       // "carre_id" => $_POST["carre_id"],
        "inv_modulo" => $_POST["inv_modulo"],
        "inv_cod_patrimonial" => $_POST["inv_cod_patrimonial"],
        "inv_denominacion" => $_POST["inv_denominacion"],
        "inv_marca" => $_POST["inv_marca"],
        "inv_modelo" => $_POST["inv_modelo"],
        "inv_serie" => $_POST["inv_serie"],
        "inv_color" => $_POST["inv_color"],
        "inv_estado" => $_POST["inv_estado"],
        "inv_valor" => $_POST["inv_valor"],
        "inv_otros" => $_POST["inv_otros"],
        "inv_observacion" => $_POST["inv_observacion"],
        "id_mod_carre" => $_POST["id_mod_carre"],

    );
    $actualizarInventario->ajaxActualizarInventario($data);
}

/*===================================================================*/
//PARA ELIMINAR  INVENTARIO
/*===================================================================*/ else if (isset($_POST['accion']) && $_POST['accion'] == 4) {
    $eliminarInventario  = new AjaxInventario();
    $eliminarInventario->ajaxEliminarInventario();
}