<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../conexion_reportes/r_conexion.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',

    'orientation' => 'L'
]);
$fechaActual = date('Y-m-d');


$query = "SELECT
            CONCAT_WS(' ', usuarios.nombre_usuario, usuarios.apellido_usuario) AS nombres,
            usuarios.dni, 
            usuarios.correo, 
            usuarios.organo, 
            usuarios.ubicacion, 
            usuarios.direccion, 
            usuarios.cargo,
            carreras.carre_descripcion
          FROM
            (
              SELECT
                *
              FROM
                usuarios
              WHERE
                id_usuario = '" . $_GET['usu'] . "'
            ) AS usuarios
          LEFT JOIN
            carreras ON usuarios.carre_id = carreras.carre_id";


$resultado = $mysqli->query($query);
while ($row1 = $resultado->fetch_assoc()) {


    $html = '<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 1</title>
        <link rel="stylesheet" href="" media="all" />
      </head>
      <body>

        <img src="ministerio_educacion.png" alt="" class="image-left">
        <img src="logo_tecno.png" alt="Imagen 2" class="image-right" style="width: 95px;">


      
        <header class="clearfix">
        <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
    
    
         th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
        .image-left {
            float: left;
            
            margin-right: 10px; /* Espacio entre la imagen izquierda y el contenido */
            max-width: 120px; /* Ancho máximo de la imagen izquierda */
        }
    
        .image-right {
            float: right;
            margin-left: 10px; /* Espacio entre la imagen derecha y el contenido */
            max-width: 220px; /* Ancho máximo de la imagen derecha */
        }
    
        th {
            /* background-color: #ddd; */
            font-weight: bold;
            text-transform: uppercase;
            position: relative;
            font-weight: bold;

        }
    
        th img {
            float: left;
            margin-right: 20px;
            max-width: 100px;
            transform: translateY(-50%);
            right: 20px;
            max-width: 100px;
        }
        @page {
            margin: 5mm;
            margin-header: 0mm;
            margin-footer: 0mm;
            odd-footer-name: html_myfooter1;
            font-weight: bold;

            }
        </style>
        <br><br><br><br><br><br>

    <table style=" width: 100%;">
        <thead>
            <tr>
                <th colspan="12"  style="color:black;  font-size: 15px;  text-align: center;"><b>INVENTARIO DE BIENES PATRIMONIALES DEL COLEGIO BOLIVARIANO "56008"</b></th>
            </tr>
        </thead>
    </table>

       
    <table style=" width: 100%;">
            <thead>
                <tr>
                    <th colspan="11" style="color:black;  font-size: 12px;  text-align: left;"><b>INSTITUCION EDUCATIVA COLEGIO BOLIVARIANO "56008"</b></th>
                    <th colspan="1" style="color:black; font-size: 12px; text-align: left;"><b>FECHA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> ' . $fechaActual . '</th>
                </tr>

            <tr>
                <th colspan="10" style="color:black;   font-size: 12px; text-align: left; "><b>UNIDAD DE ' . $row1['carre_descripcion'] . '</th><b/>     
                <th colspan="2" style="color:black;   font-size: 12px; text-align: right; "><b>PERSONAL INVENTARIADOR</b></th><b/>               
          
            </tr>



                <tr>
                    <th colspan="8" style="color:black; font-size: 12px; text-align: right;"><b>USUARIO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . $row1['nombres'] . '</th> <b/>              
                    <th colspan="2" style="color:black; font-size: 12px; text-align: right; "><b>DNI: &nbsp;&nbsp; ' . $row1['dni'] . '</b></th>
                    <th colspan="2" style="color:black; font-size: 12px; text-align: right; "><b>EQUIPO DE TRABAJO</b></th>

                </tr>

                <tr>
                    <th colspan="11" style="color:black; font-size: 12px; text-align: left;"><b>CARGO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DIRECTOR</th> <b/>              
                    <th colspan="1" style="color:black; font-size: 12px; text-align: right; "><b>Lic. Gualberto Ccoa Quispe</b></th>
                </tr>

                <tr>
                    <th colspan="10" style="color:black; font-size: 12px; text-align: left;"><b>AREA: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MONITOREO DE BIENES PATRIMONIALES</th> <b/>              
                    <th colspan="2" style="color:black; font-size: 12px; text-align: right; "><b>Direccion, Subdireccion, Secretaria, Almacen, Deporte y Musica, Laboratorio</th>
                </tr>


                <tr>
                     <th  colspan="12"  style="color:black;   font-size: 12px; text-align: left; width: 100%; "><b>TIPO DE VERIFICACION: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FISICA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(X)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIGITAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(X)</b></th>               
                </tr>

                
            </thead>
           
            

           
        </table>
        

        <table>
        <thead>
            <tr>
                <th colspan="12"  style="color:black;  font-size: 12px;"><b>REPORTE DEL MONITOREO
                   
                </b></th>
            </tr>
           
            
            <tr>
                <th style="color:black;   font-size: 9px;"><b>NRO</b></th>
                <th style="color:black; font-size: 9px;"><b>COD. PATRIMONIAL</b></th>
                <th style="color:black; font-size: 9px;"><b>DENOMINACION</b></th>
                <th style="color:black; font-size: 9px;"><b>MARCA</b></th>
                <th style="color:black; font-size: 9px;"><b>MODELO</b></th>
                <th style="color:black; font-size: 9px;"><b>SERIE</b></th>
                <th style="color:black; font-size: 9px;"><b>COLOR</b></th>
                <th style="color:black; font-size: 9px;"><b>ESTADO DE CONSERVACION</b></th>
                <th style="color:black; font-size: 9px;"><b>VALOR</b></th>
                <th style="color:black; font-size: 9px;"><b>OTROS</b></th>
                <th style="color:black; font-size: 9px;"><b>OBSERVACIONES</b></th>

            </tr>
        </thead>
        <tbody>';
    $query2 = "SELECT
        i.inv_id, 
        c.carre_descripcion, 
        i.inv_modulo, 
        i.inv_cod_patrimonial, 
        i.inv_denominacion, 
        i.inv_marca, 
        i.inv_modelo, 
        i.inv_serie, 
        i.inv_color, 
        i.inv_estado, 
        i.inv_valor, 
        i.inv_otros, 
        i.inv_observacion,
        '' as opciones,
        i.carre_id
        FROM
        inventario i
        INNER JOIN
        carreras c
        ON 
        i.carre_id = c.carre_id 
        where i.carre_id = '" . $_GET['carrera'] . "' and i.inv_modulo = '" . $_GET['modulo'] . "'";
    $contador = 0;
    $resultado2 = $mysqli->query($query2);
    while ($row2 = $resultado2->fetch_assoc()) {
        $contador++;
        
        $html .= '<tr >
   
    <td class="desc"  style=" font-size: 9px; "> ' . $contador . '</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['inv_cod_patrimonial'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['inv_denominacion'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['inv_marca'] . '</td>
    <td class="desc"  style=" font-size: 9px;">' . $row2['inv_modelo'] . '</td>
    <td class="desc"  style=" font-size: 9px; ">' . $row2['inv_serie'] . '</td>
    <td class="desc"  style=" font-size: 9px;  ">' . $row2['inv_color'] . '</td>
    <td class="desc" style="color:black; font-size: 9px;">' . $row2['inv_estado'] . '</td>
    <td class="desc" style="color:black; font-size: 9px;">' . $row2['inv_valor'] . '</td>    
    <td class="desc" style="color:black; font-size: 9px;">' . $row2['inv_otros'] . '</td>
    <td class="desc" style="color:black; font-size: 9px;">' . $row2['inv_observacion'] . '</td>
    </tr>';
    }


    $html .= '
               
            </tbody>
          </table>
         

        
        </main>
        <footer>
        

        </footer>
      </body>
    </html>';
}




$css = file_get_contents('css/style_coti.css');
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
