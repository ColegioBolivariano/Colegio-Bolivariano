  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h4 class="m-0">Ajustes</h4>
              </div><!-- /.col -->
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Ajustes</li>
                  </ol>
              </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content pb-2">
      <div class="container-fluid">
          <div class="row p-0 m-0">
              <div class="col-md-12">
                  <div class="card card-info card-outline shadow ">
                      <div class="card-header">
                          <h3 class="card-title">Configuracion De la Institucion Educativa</h3>

                      </div>
                      <form action="" class="form-horizontal">
                          <div class=" card-body">
                              <form class="needs-validation" novalidate>
                                  <div class="row">
                                      <div class="col-md-8">
                                          <div class="form-group mb-2">
                                              <label for="" class="">

                                                  <span class="small"> Razon Social</span><span
                                                      class="text-danger">*</span>
                                              </label>
                                              <input type="text" name="" id="confi_id" hidden>
                                              <input type="text" class=" form-control form-control-sm" id="text_razon"
                                                  name="text_razon" required>
                                              <div class="invalid-feedback">Debe ingresar la Razon social</div>

                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group mb-2">
                                              <label for="" class="">

                                                  <span class="small">Ruc</span><span class="text-danger">*</span>
                                              </label>
                                              <input type="text" class=" form-control form-control-sm" id="text_ruc"
                                                  name="text_ruc" required>
                                              <div class="invalid-feedback">Debe ingresar el ruc</div>

                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group mb-2">
                                              <label for="" class="">

                                                  <span class="small">Direccion</span><span class="text-danger">*</span>
                                              </label>
                                              <input type="text" class=" form-control form-control-sm"
                                                  id="text_direccion" name="text_direccion" required>
                                              <div class="invalid-feedback">Debe ingresar la Direccion</div>

                                          </div>
                                      </div>
                                     
                                      <div class="col-lg-6">
                                          <div class="form-group mb-2">
                                              <label for="" class="">

                                                  <span class="small">Correo</span><span class="text-danger">*</span>
                                              </label>
                                              <input type="text" class=" form-control form-control-sm" id="text_correo"
                                                  name="text_correo" required>
                                              <div class="invalid-feedback">Debe ingresar la Direccion</div>

                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                                <div class="form-group mb-2">
                                                    <label class="" for=""> 
                                                    <span class="small">Seleccione una imagen </span>
                                                    </label>
                                                    <input type="file" class="form-control form-control-sm" 
                                                    id="text_imagen" 
                                                    accept="image/*"
                                                    onchange="previewFile(this);">
                                                
                                                
                                                </div>
                                                
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div style="width:50%; height:280px;">
                                        <img id="previewImg" src="vistas/assets/imagenes/default.png" 
                                        class="border border-secondary" style="objet-filt:cover; width:100%; height:100%;" alt="">

                                        </div>

                                    </div>
                                   
                                    <input type="hidden" name="edit_foto" id="edit_foto">
                                </div>
                              </form>

                          </div>
                      </form>
                      <div class="card-footer">
                          <!-- <button class="btn btn-info btn-sm float-left" id="btnGuardar"><i class="fas fa-save"></i> Guardar</button> -->
                          <button class="btn btn-info btn-sm float-left" id="btnGuardar">Guardar</button>
                          <!-- <a class="btn btn-primary btn-sm" style="width:120px;" id="btnGuardar2">Buscar</a> -->
                      </div>
                  </div>
              </div>

          </div>

      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  <script>
var accion;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
$(document).ready(function() {
    // clearInterval(corre);

    /* ======================================================================================
      TRAER LOS DATOS
      ======================================================================================*/
    CargarDatosEmpresa();

    $("#btnCalcular").on('click', function() {
        /// alert('dsds');


    })



    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnGuardar").addEventListener("click", function() {
        var razon = $("#text_razon").val();
        var correla = $("#text_correlativo").val();
        var correo = $("#text_correo").val();
        var direc = $("#text_direccion").val();
        var moneda = $("#text_moneda").val();

        if (razon == "") {
            Toast.fire({
                icon: 'error',
                title: 'Ingresar una razon de la empresa'
            });
            $("#text_razon").focus();
        } else if (correla == "") {
            Toast.fire({
                icon: 'error',
                title: ' Ingresar el correlativo'
            });
            $("#text_correlativo").focus();

        } else if (correo == "") {
            Toast.fire({
                icon: 'error',
                title: 'Debe ingresar un correo'
            });
            $("#text_correo").focus();

        } else if (direc == "") {
            Toast.fire({
                icon: 'error',
                title: 'Ingresar la dirección'
            });
            $("#text_direccion").focus();

        } else if (moneda == "") {
            Toast.fire({
                icon: 'error',
                title: 'Ingresar la moneda'
            });
            $("#text_moneda").focus();

        } else {


            const inputImage = document.querySelector('#text_imagen');
            //console.log("Listo para registrar el producto")
            Swal.fire({
                title: 'Esta seguro de Actualizar la informacion?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", 2);
                    datos.append("confi_id", $("#confi_id").val()); //id
                    datos.append("confi_razon", $("#text_razon").val()); //nombre
                    datos.append("confi_ruc", $("#text_ruc").val()); //peso
                    datos.append("confi_direccion", $("#text_direccion").val());
                  
                    datos.append("config_correo", $("#text_correo").val());
                   
                    datos.append('archivo[]', inputImage.files[0]);


                    $.ajax({
                        url: "ajax/configuracion_ajax.php",
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
                                    title: 'Datos Actualizados'
                                    //title: titulo_msj
                                });

                                $(".needs-validation").removeClass(
                                    "was-validated");

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'no se pudo Actualizar'
                                });
                            }

                        }
                    });
                }
            })


        }


    });


})

//FUNCIONES

/*===================================================================*/
//FUNCION PARA CARGAR DATOS DE LA EMPRESA EN TEXBOX
/*===================================================================*/
function CargarDatosEmpresa() {

    $.ajax({
        async: false,
        url: "ajax/configuracion_ajax.php",
        method: "POST",
        data: {
            'accion': 1
        },
        dataType: 'json',
        success: function(respuesta) {

            confi_id = respuesta["confi_id"];
            razon_social = respuesta["confi_razon"]; //campos de base
            ruc = respuesta["confi_ruc"];
            direccion = respuesta["confi_direccion"];
            nro_correlativo = respuesta["confi_correlativo"];
            email = respuesta["config_correo"];
            moneda = respuesta["config_moneda"];
            imagen = respuesta["imagen"];

            $("#confi_id").val(confi_id);
            $("#text_razon").val(razon_social); //SETEAMOS EN LOS TEXTBOX
            $("#text_ruc").val(ruc);
            $("#text_direccion").val(direccion);
            $("#text_correlativo").val(nro_correlativo);
            $("#text_correo").val(email);
            $("#text_moneda").val(moneda);

            $("#edit_foto").val(imagen);

            if(imagen != ""){
                $("#previewImg").attr('src', 'vistas/assets/img/empresa/'+imagen)
            }
        }
    });
}



function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if(file["type"] != "image/jpeg" && file["type"] != "image/png"){
        $("#text_imagen").val('');
       
        Toast.fire({
                icon: 'error',
                title: 'La imagen debe ser jpeg o png!'
               
            });
    }else if(file["size"] > 2000000 ){

        $("#text_imagen").val('');
         Toast.fire({
                icon: 'error',
                title: 'La imagen no debe pesar más de 2mb!'
               //footer: '<a href>Why do I have this issue?</a>'
            });
    }
    else{
   // if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }

}
  </script>



