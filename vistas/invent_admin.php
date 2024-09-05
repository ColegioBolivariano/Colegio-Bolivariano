  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <!-- <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Inventario</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                      <li class="breadcrumb-item active">Inventario</li>
                  </ol>
              </div>
          </div> -->
      </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content pb-2">
      <div class="container-fluid">
          <div class="row p-0 m-0">
              <div class="col-md-12">
                  <div class="card card-info card-outline shadow ">
                      <div class="card-header">
                          <h3 class="card-title">Listado de Inventario</h3>
                          <button class="btn btn-info btn-sm float-right" id="abrirmodal_inventario"><i
                                  class="fas fa-plus"></i>
                              Nuevo</button>
                      </div>
                      <div class=" card-body">
                          <!-- <div class="col-12"> -->
                          <div class="table">
                              <table id="tbl_inventario"
                                  class="table display table-hover text-nowrap compact  w-100  rounded">
                                  <thead class="bg-info text-left">
                                      <tr>
                                          <th>Id</th>
                                          <th>Area</th>
                                          <th>Modulo</th>
                                          <th>Codigo P.</th>
                                          <th style="width: 30px;">Denominacion</th>
                                          <th>Marca</th>
                                          <th>Modelo</th>
                                          <th>Serie</th>
                                          <th>Color</th>
                                          <th>Estado</th>
                                          <th>Valor</th>
                                          <th>Otros</th>
                                          <th>Observacion</th>

                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody class="small text left">
                                  </tbody>
                              </table>

                          </div>

                          <!-- </div> -->


                      </div>
                  </div>
              </div>

          </div>

      </div>
  </div>
  <!-- /.content -->

  <!-- MODAL REGISTRAR INVENTARIO-->
  <div class="modal fade" id="modal_registro_inventario" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header bg-gray py-1 align-items-center">
                  <h5 class="modal-title" id="titulo_modal_inventario">Registro de Inventario</h5>
                  <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_inventario"
                      data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form class="needs-validation" novalidate>
                      <div class="row">

                          <div class="col-lg-6">
                              <div class="form-group mb-2">
                                  <label for="" class="">
                                      
                                      <span class="small">Area</span><span class="text-danger">*</span>
                                  </label>
                                  <select name="" id="select_carrera" class="form-select form-select-sm"
                                      aria-label=".form-select-sm example" ></select>

                                  <div class="invalid-feedback">Seleccione Una Area</div>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group mb-2">
                                  <label for="" class="">
                                  <input type="text" id="id_inven" hidden>
                                      <span class="small">Modulo</span><span class="text-danger">*</span>
                                  </label>
                                  <select name="" id="select_modulo" class="form-select form-select-sm"
                                      aria-label=".form-select-sm example" required>
                                      <!-- <option value="">Seleccione..</option> -->
                                      <!-- <option value="I">I</option>
                                      <option value="II">II</option>
                                      <option value="III">III</option> -->
                                  </select>
                                  <input type="hidden" name="mod_des" id="mod_des">
                                  

                                  <div class="invalid-feedback">Seleccione un modulo</div>

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Codigo</span><span class="text-danger">*</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_codigo"
                                      name="text_codigo" placeholder="Codigo Patrimonial" required>
                                  <div class="invalid-feedback">Debe ingresar una codigo</div>

                              </div>
                          </div>
                          <div class="col-lg-8">

                              <div class="form-group mb-2">
                                  <label for="" class=""> <span class="small"> Denominacion</span>
                                      <span class="text-danger">*</span></label>
                                  <textarea class="form-control" rows="5" placeholder="Demoninacion" id="text_denomina"
                                      required></textarea>
                                  <div class="invalid-feedback">Debe ingresar una denominacion</div>
                              </div>
                          </div>

                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Marca</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_marca"
                                      name="text_marca" placeholder="Marca">
                                  <!-- <div class="invalid-feedback">Debe ingresar una denominacion</div> -->

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Modelo</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_modelo"
                                      name="text_modelo" placeholder="Modelo">
                                  <!-- <div class="invalid-feedback">Debe ingresar una denominacion</div> -->

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Serie</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_serie"
                                      name="text_serie" placeholder="Serie">
                                  <!-- <div class="invalid-feedback">Debe ingresar una denominacion</div> -->

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Color</span>
                                  </label>
                                  <input type="texarea" class=" form-control form-control-sm" id="text_color"
                                      name="text_color" placeholder="Color">
                                  <!-- <div class="invalid-feedback">Debe ingresar una denominacion</div> -->

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Estado</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_estado"
                                      name="text_estado" placeholder="Estado" required>
                                  <div class="invalid-feedback">Debe ingresar un estado</div>

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Valor</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_valor"
                                      name="text_valor" placeholder="Valor">
                                  <!-- <div class="invalid-feedback">Debe ingresar una denominacion</div> -->

                              </div>
                          </div>
                          <div class="col-lg-4">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Otros</span>
                                  </label>
                                  <input type="texarea" onkeyup="mayus(this);" class=" form-control form-control-sm"
                                      id="text_otros" name="text_otros" placeholder="Otros" required>
                                  <div class="invalid-feedback">Debe ingresar una descripcion</div>

                              </div>
                          </div>
                          <div class="col-lg-8">
                              <div class="form-group mb-2">
                                  <label for="" class="">

                                      <span class="small"> Observaciones</span>
                                  </label>
                                  <input type="text" onkeyup="mayus(this);" class=" form-control form-control-sm"
                                      id="text_observa" name="text_observa" placeholder="Observacion" required>
                                  <div class="invalid-feedback">Debe ingresar una observacion</div>

                              </div>
                          </div>

                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                      id="btncerrar_inventario">Cerrar</button>
                  <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_carreras">Registrar</button> -->
                  <a class="btn btn-primary btn-sm" id="btnregistrar_inventario">Registrar</a>
              </div>
          </div>
      </div>
  </div>
  <!-- fin Modal -->

  <script>
var accion;
var tbl_inventario, titulo_modal;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
$(document).ready(function() {
    var id_perfil = $("#text_Idperfil").val();
    //console.log(id_perfil);

    if (id_perfil == 1 ){
       
      
        $(".btnEliminarInventario").attr('hidden', false);
    }else {
        $(".btnEliminarInventario").attr('hidden', true);
    }

     /*===================================================================*/
    //SOLICITUD AJAX PARA CARGAR SELECT DE modulos
    /*===================================================================*/
    $.ajax({
        url: "ajax/modulosCarreras_ajax.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="">Seleccione un modulo...</option>';
           // var options = '<option selected value=""></option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] +' data-stock =' + respuesta[index][1] + '>' + respuesta[index][1] + '</option>';
                //options = options + '<option value=' + respuesta[index][0] + ' data-stock =' + respuesta[index][2] + '>' + respuesta[index][1] + '</option>';

            }

            $("#select_modulo").append(options);

        }
    });

    $("#select_modulo").change(function() {
        var mData = this.options[this.selectedIndex].dataset;
        //console.log(mData);
        var lstock = document.getElementById('mod_des');

            lstock.value = mData.stock;
    })

    /*===================================================================*/
    //SOLICITUD AJAX PARA CARGAR SELECT DE CARRERAS
    /*===================================================================*/
    $.ajax({
        url: "ajax/carreras_ajax.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta) {

            var options = '<option selected value="">Seleccione una area...</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                    1
                ] + '</option>';

            }

            $("#select_carrera").append(options);

        }
    });


    /***************************************************************************
     * INICIAR DATATABLE INVENTARIO
     ******************************************************************************/
    tbl_inventario = $("#tbl_inventario").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte de inventario',
                "exportOptions": {
                    'columns': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                "download": 'open'
            },
            'pageLength',
        ],
        ajax: {
            url: "ajax/inventario_ajax_admin.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1
            }, //LISTAR INVENTARIO
        },
        columnDefs: [{
                targets: 0,
                visible: false

            },
            {
                targets: 5,
                visible: false

            },
            {
                targets: 6,
                visible: false

            },
            {
                targets: 7,
                visible: false

            },
            {
                targets: 8,
                visible: false

            },
            {
                targets: 9,
                visible: false

            },
            {
                targets: 10,
                visible: false

            },
            {
                targets: 11,
                visible: false

            },
            {
                targets: 12,
                visible: false

            },


            {
                targets: 13,
                //sortable: true, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarInventario text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Inventario'> " +
                        "<i class='fas fa-pencil-alt fs-6'></i> " +
                        "</span> " +

                        "<span class='btnEliminarInventario text-danger px-1'style='cursor:pointer;' id='eliminar' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Inventario'> " +
                        "<i class='fas fa-trash fs-6'> </i> " +
                        "</span>" +
                        "</center>"
                }
            }
        ],
        "order": [
            [0, 'asc']
        ],
        lengthMenu: [0, 5, 10, 15, 20, 50],
        "pageLength": 10,
        "language": idioma_espanol,
        select: true
    });



    /*===================================================================*/
    //EVENTO PARA ABRIR EL MODAL DE REGISTRAR AL DAR CLICK EN BOTON NUEVO
    /*===================================================================*/
    $("#abrirmodal_inventario").on('click', function() {
        AbrirModalRegistroInventario();
    })




    /*===================================================================*/
    //EVENTO QUE GUARDA Y ACTUALIZA LOS DATOS DEL MODULO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnregistrar_inventario").addEventListener("click", function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {

                Swal.fire({
                    title: 'Esta seguro de guardar el registro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("inv_id", $("#id_inven").val());
                        datos.append("carre_id", $("#select_carrera").val());
                        datos.append("inv_modulo", $("#mod_des").val());
                        datos.append("inv_cod_patrimonial", $("#text_codigo").val());
                        datos.append("inv_denominacion", $("#text_denomina").val());
                        datos.append("inv_marca", $("#text_marca").val());
                        datos.append("inv_modelo", $("#text_modelo").val());
                        datos.append("inv_serie", $("#text_serie").val());
                        datos.append("inv_color", $("#text_color").val());
                        datos.append("inv_estado", $("#text_estado").val());
                        datos.append("inv_valor", $("#text_valor").val());
                        datos.append("inv_otros", $("#text_otros").val());
                        datos.append("inv_observacion", $("#text_observa").val());
                        datos.append("id_mod_carre", $("#select_modulo").val());

                        if (accion == 2) {
                            var titulo_msj = "Se registro correctamente"
                            //var titulo_modal = "Registrar";
                        }

                        if (accion == 3) {
                            var titulo_msj = "Se actualizo correctamente"
                            //var titulo_modal = "Actualizar";
                        }
                        $.ajax({
                            url: "ajax/inventario_ajax.php",
                            method: "POST",
                            data: datos, //enviamos lo de la variable datos
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {

                                if (respuesta == "ok") {

                                    Toast.fire({
                                        icon: 'success',
                                        //title: 'El  se registro de forma correcta'
                                        title: titulo_msj
                                    });

                                    tbl_inventario.ajax
                                        .reload(); //recargamos el datatable 

                                    $("#modal_registro_inventario").modal(
                                        'hide');

                                    $("#id_inven").val();
                                    $("#select_carrera").val();
                                    $("#select_modulo").val();
                                    $("#text_codigo").val();
                                    $("#text_denomina").val();
                                    $("#text_marca").val();
                                    $("#text_modelo").val();
                                    $("#text_serie").val();
                                    $("#text_color").val();
                                    $("#text_estado").val();
                                    $("#text_valor").val();
                                    $("#text_otros").val();
                                    $("#text_observa").val();

                                    $(".needs-validation").removeClass(
                                        "was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'No se pudo registrar'
                                    });
                                }

                            }
                        });



                    }
                })


            } else {
                //console.log(" ") //No paso la validacion
            }
            form.classList.add('was-validated');
        });
    });


    /* ======================================================================================
     EVENTO AL DAR CLICK EN EL BOTON EDITAR INVENTARIO
    =========================================================================================*/
    $("#tbl_inventario tbody").on('click', '.btnEditarInventario', function() {

        accion = 3; //seteamos la accion para editar
        titulo_modal = 'Actualizar';
        $("#modal_registro_inventario").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_inventario").modal('show');
        $("#titulo_modal_inventario").html('Actualizar Inventario');
        $("#btnregistrar_inventario").html('Actualizar');

        if (tbl_inventario.row(this).child.isShown()) {
            var data = tbl_inventario.row(this).data();
        } else {
            var data = tbl_inventario.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE

        }
        // console.log(data);

        $("#id_inven").val(data[0]);
        $("#select_carrera").val(data[14]);
        //$("#select_modulo").val(data[2]);
        $("#text_codigo").val(data[3]);
        $("#text_denomina").val(data[4]);
        $("#text_marca").val(data[5]);
        $("#text_modelo").val(data[6]);
        $("#text_serie").val(data[7]);
        $("#text_color").val(data[8]);
        $("#text_estado").val(data[9]);
        $("#text_valor").val(data[10]);
        $("#text_otros").val(data[11]);
        $("#text_observa").val(data[12]);
        $("#select_modulo").val(data[15]);
        $("#mod_des").val(data[16]);


    })


    /* ======================================================================================
     EVENTO AL DAR CLICK EN EL BOTON ELIMINAR USUARIO
    =========================================================================================*/
    $("#tbl_inventario tbody").on('click', '.btnEliminarInventario', function() {

        accion = 4; //seteamos la accion para ELIMINAR

        if (tbl_inventario.row(this).child.isShown()) {
            var data = tbl_inventario.row(this).data();
        } else {
            var data = tbl_inventario.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
        }

        var id_inven = data[0];

        Swal.fire({
            title: 'Desea Eliminar el registro?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("inv_id",
                    id_inven);
                $.ajax({
                    url: "ajax/inventario_ajax.php",
                    method: "POST",
                    data: datos, //enviamos lo de la variable datos
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

                        if (respuesta == "ok") {

                            Toast.fire({
                                icon: 'success',
                                title: 'El registro se Elimino de forma correcta'
                                // title: titulo_msj
                            });

                            tbl_inventario.ajax.reload(); //recargamos el datatable

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'El registro  no se pudo Eliminar'
                            });
                        }

                    }
                });

            }
        })

    })


    /* ======================================================================================
    EVENTO QUE LIMPIA EL INPUT  AL CERRAR LA VENTANA MODAL
    =========================================================================================*/
    $("#btncerrarmodal_inventario, #btncerrar_inventario").on('click', function() {
        $("#id_inven").val("");
        $("#select_carrera").val("");
        $("#select_modulo").val("");
        $("#text_codigo").val("");
        $("#text_denomina").val("");
        $("#text_marca").val("");
        $("#text_modelo").val("");
        $("#text_serie").val("");
        $("#text_color").val("");
        $("#text_estado").val("");
        $("#text_valor").val("");
        $("#text_otros").val("");
        $("#text_observa").val("");
        $("#mod_des").val("");

    })

    /*===================================================================*/
    //EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
    /*===================================================================*/
    document.getElementById("btncerrar_inventario").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })
    document.getElementById("btncerrarmodal_inventario").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })









});




///////////////////////////////////////////////////FUNCIONES///////////////////////////////////////////////////////////


function AbrirModalRegistroInventario() {
    $("#modal_registro_inventario").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_registro_inventario").modal('show'); //abrimos el modal
    $("#titulo_modal_inventario").html('Registrar Inventario');
    $("#btnregistrar_inventario").html('Registrar');
    accion = 2; // guardar
    titulo_modal = "Registrar";
}


/*===================================================================*/
//PARA MAYUSCULAS
/*===================================================================*/
function mayus(e) {
    e.value = e.value.toUpperCase();
}





var idioma_espanol = {
    select: {
        rows: "%d fila seleccionada"
    },
    "sProcessing": "Procesando...",
    "sLengthMenu": "Ver _MENU_ ",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "No hay informacion en esta tabla",
    "sInfo": "Mostrando (_START_ a _END_) total de _TOTAL_ registros",
    "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
    "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
    "SInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "<b>No se encontraron datos</b>",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "aria": {
        "sSortAscending": ": ordenar de manera Ascendente",
        "SSortDescending": ": ordenar de manera Descendente ",
    }
}
  </script>