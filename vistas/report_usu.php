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
                          <h3 class="card-title">Reporte </h3>

                      </div>
                      <div class=" card-body">
                          <div class="row">

                              <!-- <div class="col-lg-4">
                                  <div class="form-group mb-2">
                                      <label for="" class="">
                                          <input type="text" id="id_inven" hidden>
                                          <span class="small">Carrera</span><span class="text-danger">*</span>
                                      </label>
                                      <select name="" id="select_carrera" class="form-select form-select-sm"
                                          aria-label=".form-select-sm example" required></select>
                                  </div>
                              </div> -->
                              <div class="col-lg-4">
                                  <div class="form-group mb-2">
                                      <label for="" class="">
                                          <span class="small">Modulo</span><span class="text-danger">*</span>
                                      </label>
                                      <select name="" id="select_modulo" class="form-select form-select-sm js-example-basic-single" aria-label=".form-select-sm example" required>
                                          <!-- <option value="">Seleccione..</option>
                                          <option value="I">I</option>
                                          <option value="II">II</option>
                                          <option value="III">III</option> -->
                                      </select>
                                      <input type="hidden" name="mod_des" id="mod_des">
                                  </div>
                              </div>
                              
                              <div class="col-md-4 d-flex flex-row align-items-center justify-content-end">
                                  <label for="">&nbsp;&nbsp;</label><br>
                                  <div class="form-group m-0"><a class="btn btn-info btn-sm" style="width:120px;" id="btnFiltrar_reporte">Generar</a>
                                  </div>
                              </div>
                          </div><br>


                      </div>
                  </div>
              </div>

          </div>

      </div>
  </div>
  <!-- /.content -->

  <script>
      $(document).ready(function() {
          $('.js-example-basic-single').select2();
      });
  </script>




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

                  var options = '<option selected value="">Seleccione Una Area...</option>';

                  for (let index = 0; index < respuesta.length; index++) {
                      options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                          1
                      ] + '</option>';

                  }

                  $("#select_carrera").append(options);

              }
          });

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
                      options = options + '<option value=' + respuesta[index][0] + ' data-stock =' + respuesta[index][1] + '>' + respuesta[index][1] + '</option>';
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

          $("#btnFiltrar_reporte").on('click', function() {
              var id_carre = $("#text_Idcarrera").val();
              var modulo = $("#select_modulo").val();
              var mod_des = $("#mod_des").val();
              var usu = $("#text_Idprincipal").val();

              if (modulo == "") {
                  Toast.fire({
                      icon: 'error',
                      title: ' Seleccione un modulo'
                  });
                  $("#select_modulo").focus();
              } else {

                  window.open("MPDF/reporte_inventario.php?carrera=" + parseInt(id_carre) + "&modulo=" + mod_des + "&usu=" + usu + "#zoom=90", "Reporte Inventario", "scrollbards=NO");
                  //window.open("MPDF/ticket_pago_cuota.php?codigo=" + data[1] + "&cuota=" + data[2] + "#zoom=100","Recibo de Pago ", "scrollbards=NO");

              }
          })




      });
  </script>