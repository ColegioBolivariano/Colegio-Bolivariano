  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Panel de Monitoreo</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                      <li class="breadcrumb-item active">Panel</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
              <!-- TARJETA DE Carreras -->
              <div class="col-lg-4">
                  <div class="small-box bg-info">
                      <div class="inner">
                         
                        <h4 id="totalcarrera">222</h4>
                        <p>Areas</p>

                         
                      </div>
                      <div class="icon">
                          <i class="ion ion-clipboard"></i>
                      </div>
                      <a style="cursor:pointer;" class="small-box-footer"></a>
                  </div>
              </div>

              <!-- TARJETA DE Registros -->
              <div class="col-lg-4">
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h4 id="totalregistros">222</h4>

                          <p>Registros</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-clipboard"></i>
                      </div>
                      <a style="cursor:pointer;"  class="small-box-footer"></a>
                  </div>
              </div>

              <!-- TARJETA DE Usuarios -->
              <div class="col-lg-4">
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h4 id="totalusuarios">222</h4>

                          <p>Usuarios</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-clipboard"></i>
                      </div>
                      <a style="cursor:pointer;" class="small-box-footer"> </a>
                  </div>
              </div>

          </div>
          <!-- TERMINA TARJETAS -->


            <!-- TABLA DETALLE DE INVENTARIO -->
            <div class="row">
              <div class="col-md-12">
                  <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">Resumen de inventario</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                              </button>

                          </div>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table display table-hover text-nowrap compact  w-100  rounded" id="tbl_resumen">
                                  <thead>
                                      <tr>
                                          <th>Areas</th>
                                          <th>Modulo Existente</th>
                                          <th>Total de Registros</th>
                                         
                                         
                                      </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div>

              </div>
              

          </div>
          </div>
  </div><!-- /.container-fluid -->


  
  <script>
      
      $(document).ready(function() {
          //cap();

          /*************************************
           * TARJETAS AJAX EN TABLERO
           *************************************/
          $.ajax({
              url: "ajax/dashboard_ajax.php",
              method: 'POST',
              dataType: 'json',
              success: function(respuesta) {
                  //console.log("respuesta", respuesta);
                  //capturamos lo del array(respuesta) y enviamos a los ID
                  $("#totalcarrera").html(respuesta[0]['carreras']);
                  $("#totalregistros").html(respuesta[0]['registros']);
                  $("#totalusuarios").html(respuesta[0]['usuarios']);
                

              }
          });


          /*************************************
           * RESUMEN INVENTARIO
           *************************************/
          $.ajax({
              url: "ajax/dashboard_ajax.php",
              method: 'POST',
              data: {
                  'accion': 2
              }, //optener datos
              dataType: 'json',
              success: function(respuesta) {
                 for (let i = 0; i < respuesta.length; i++) {
                      filas = '<tr>' +

                          '<td>' + respuesta[i]["carrera"] + '</td>' +
                          '<td>' + respuesta[i]["modulo"] + '</td>' +
                          '<td>' + respuesta[i]["contid"] + '</td>' +
              

                          '</tr>'
                      $("#tbl_resumen tbody").append(filas);

                  }

              }
          });
      })

   


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