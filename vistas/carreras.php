  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Areas</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                      <li class="breadcrumb-item active">Areas</li>
                  </ol>
              </div>
          </div>
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
                          <h3 class="card-title">Listado de Areas</h3>
                          <button class="btn btn-info btn-sm float-right" id="abrirmodal_carreras"><i
                                  class="fas fa-plus"></i>
                              Nuevo</button>
                      </div>
                      <div class=" card-body">
                          <div class="table-responsive">
                              <table id="tbl_carreras"
                                  class="table display table-hover text-nowrap compact  w-100  rounded">
                                  <thead class="bg-info text-left">
                                      <tr>
                                          <th>Id</th>
                                          <th>Descripcion</th>
                                          <th>Estado</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody class="small text left">
                                  </tbody>
                              </table>

                          </div>

                      </div>
                  </div>
              </div>

          </div>

      </div>
  </div>
  <!-- /.content -->



  <!-- MODAL REGISTRAR CARRERAS-->
  <div class="modal fade" id="modal_registro_carreras" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog " role="document">
          <div class="modal-content">
              <div class="modal-header bg-gray py-1 align-items-center">
                  <h5 class="modal-title" id="titulo_modal_carreras">Registro de Usuarios</h5>
                  <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_carreras"
                      data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form class="needs-validation" novalidate>
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="form-group mb-2">
                                  <label for="" class="">
                                      <input type="text" id="id_carre" hidden>
                                      <span class="small"> Descripcion</span><span class="text-danger">*</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_descrip"
                                      name="text_descrip" placeholder="Descripcion areas" required>
                                  <div class="invalid-feedback">Debe ingresar una descripcion del area</div>

                              </div>
                          </div>

                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                      id="btncerrar_carreras">Cerrar</button>
                  <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_carreras">Registrar</button> -->
                  <a class="btn btn-primary btn-sm" id="btnregistrar_carreras">dfdsf</a>
              </div>
          </div>
      </div>
  </div>
  <!-- fin Modal -->

  <script>
var accion;
var tbl_carreras, titulo_modal;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
$(document).ready(function() {

    /***************************************************************************
     * INICIAR DATATABLE CARRERAS
     ******************************************************************************/
    var tbl_carreras = $("#tbl_carreras").DataTable({

        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte carreras',
                "exportOptions": {
                    'columns': [1]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [1]
                },
                "download": 'open'
            },
            'pageLength',
        ],
        ajax: {
            url: "ajax/carreras_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1
            }, //LISTAR CARRERAS
        },
        columnDefs: [{
                targets: 0,
                visible: false

            },
            {
                targets: 2,
                visible: false

            },

            // {
            //     targets: 2,
            //     //sortable: false,
            //     createdCell: function(td, cellData, rowData, row, col) {

            //         if (rowData[2] == "Activo") {
            //             $(td).html("Activo")
            //         } else {
            //             $(td).html("Inactivo")
            //         }

            //     }
            // },
            {
                targets: 3,
                //sortable: true, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarCarrera  text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Area'> " +
                        "<i class='fas fa-pencil-alt fs-6'></i> " +
                        "</span> " +

                        "<span class='btnEliminarCarrera text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Area'> " +
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
    $("#abrirmodal_carreras").on('click', function() {
        AbrirModalRegistroCarreras();
    })



    /*===================================================================*/
    //EVENTO QUE GUARDA Y ACTUALIZA LOS DATOS DEL MODULO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnregistrar_carreras").addEventListener("click", function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {

                Swal.fire({
                    title: 'Esta seguro de ' + titulo_modal + ' el Area?',
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
                        datos.append("carre_id", $("#id_carre").val())
                        datos.append("carre_descripcion", $("#text_descrip").val());

                        if (accion == 2) {
                            var titulo_msj = "El Area se registro correctamente"
                            //var titulo_modal = "Registrar";
                        }

                        if (accion == 3) {
                            var titulo_msj = "El Area se actualizo correctamente"
                            //var titulo_modal = "Actualizar";
                        }
                        $.ajax({
                            url: "ajax/carreras_ajax.php",
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
                                        //title: 'El Usuario se registro de forma correcta'
                                        title: titulo_msj
                                    });

                                    tbl_carreras.ajax
                                        .reload(); //recargamos el datatable 

                                    $("#modal_registro_carreras").modal(
                                        'hide');

                                    $("#id_carre").val("");
                                    $("#text_descrip").val("");

                                    $(".needs-validation").removeClass(
                                        "was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El Area no se pudo registrar'
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
     EVENTO AL DAR CLICK EN EL BOTON EDITAR CARRERA
    =========================================================================================*/
    $("#tbl_carreras tbody").on('click', '.btnEditarCarrera', function() {

        accion = 3; //seteamos la accion para editar
        titulo_modal = 'Actualizar';
        $("#modal_registro_carreras").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_carreras").modal('show');
        $("#titulo_modal_carreras").html('Actualizar Carreras');
        $("#btnregistrar_carreras").html('Actualizar');

        if (tbl_carreras.row(this).child.isShown()) {
            var data = tbl_carreras.row(this).data();
        } else {
            var data = tbl_carreras.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            //  console.log("🚀 ~ file: categorias.php ~ line 751 ~ $ ~ data", data);
        }

        $("#id_carre").val(data[0]);
        $("#text_descrip").val(data[1]);


    })



    /* ======================================================================================
     EVENTO AL DAR CLICK EN EL BOTON ELIMINAR USUARIO
    =========================================================================================*/
    $("#tbl_carreras tbody").on('click', '.btnEliminarCarrera', function() {

        accion = 4; //seteamos la accion para ELIMINAR

        if (tbl_carreras.row(this).child.isShown()) {
            var data = tbl_carreras.row(this).data();
        } else {
            var data = tbl_carreras.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
        }

        var id_carre = data[0];

        Swal.fire({
            title: 'Desea Eliminar El Area "' + data[1] + '" ?',
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
                datos.append("carre_id",
                    id_carre);



                $.ajax({
                    url: "ajax/carreras_ajax.php",
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
                                title: 'El area se Elimino de forma correcta'
                                // title: titulo_msj
                            });

                            tbl_carreras.ajax.reload(); //recargamos el datatable

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'El area no se pudo Eliminar'
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
    $("#btncerrarmodal_carreras, #btncerrar_carreras").on('click', function() {
        $("#id_carre").val("");
        $("#text_descrip").val("");

    })


    /*===================================================================*/
    //EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
    /*===================================================================*/
    document.getElementById("btncerrar_carreras").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })
    document.getElementById("btncerrarmodal_carreras").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })




});




//////////////////////////////////////////////////////FUNCIONES////////////////////////////////////////////


function AbrirModalRegistroCarreras() {
    $("#modal_registro_carreras").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_registro_carreras").modal('show'); //abrimos el modal
    $("#titulo_modal_carreras").html('Registrar Areas');
    $("#btnregistrar_carreras").html('Registrar');
    accion = 2; // guardar
    titulo_modal = "Registrar";
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