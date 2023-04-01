<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Consultorio Jurídico</title>
      <meta name="robots" content="noindex, nofollow">
      <meta content="" name="description">
      <link href="bootstrap.min.css" rel="stylesheet">
 <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  -->   
    </head>
<body>

<?php
 require_once 'config/Conexion.php';
/*  $asesoria = $_GET['id']; */
$_GET['id'];
/* $nombreImagen = "Logo-UG-2016.png";
$imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen)); */
// Abre la Conexión con la BD.

/* $conexion = mysqli_connect('localhost','root','',"bd_consultorio"); */
$currentsite = getcwd();
/* $sql = "SELECT * FROM asesoria, info_usuario, usuario where fk_usuario=id_info_usuario AND info_usuario=id_usuario";
mysqli_set_charset($conexion,"utf8"); 
$result = mysqli_query($conexion, $sql);   */
$con = mysqli_connect('localhost','root','',"bd_consultorio"); 
/* $sql ="SELECT * 
FROM asesoria INNER JOIN info_usuario ON asesoria.fk_usuario= info_usuario.id_info_usuario
INNER JOIN materia ON materia.id_materia= asesoria.fk_materia  
INNER JOIN usuario ON usuario.id_usuario= asesoria.fk_usuario 
INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user where id_asesoria=:id"; 
mysqli_set_charset($conexion,"utf8"); 
$result = mysqli_query($conexion, $sql); */

$query="SELECT * 
FROM asesoria
INNER JOIN info_interesado ON asesoria.fk_info_interesado= info_interesado.id_info_interesado
INNER JOIN etnia ON etnia.id_etnia= info_interesado.inf_etnia
INNER JOIN genero ON genero.id_genero= info_interesado.info_genero
INNER JOIN interesado ON interesado.id_interesado= asesoria.fk_info_interesado
INNER JOIN instruccion ON instruccion.id_instruccion= info_interesado.info_instruccion
INNER JOIN ocupacion ON ocupacion.id_ocupacion= info_interesado.inf_ocupacion
INNER JOIN estado_civil ON estado_civil.id_estado_civil= info_interesado.info_estado_civil
INNER JOIN materia ON materia.id_materia= asesoria.fk_materia  
INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario= asesoria.fk_tipo_user
where id_asesoria=".$_GET['id'].";";
    $res=mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($res);

     
?>
<style>
/*     .dis-table {
   width: 100%;
   border: 1px solid #000;
} */
/* .dis-table .th-t , .td-d {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
} */

.th-t,.td-d{
    width: 30%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-collapse: collapse;
   padding: 0.3em;
   caption-side: bottom;
}

/* caption {
   padding: 0.3em;
} */
</style>
<div><img src="assets/img/Logo-UG-2016.jpg" alt="" style="height:75px;position:absolute;"></div>
<div><img src="assets/img/logo-jr.png" alt="" style="height:78px;width:73;position:absolute;right:0.5px;
  ">
</div>
<div style="text-align:center; font-size:13px;line-height: 0.5;">
    <h3>UNIVERSIDAD DE GUAYAQUIL</h3>
    <h3>FACULTAD DE JURISPRUDENCIA Y CIENCIAS SOCIALES Y POLITICAS</h3>
    <H2>CONSULTORIO JURÍDICO GRATUITO</H2>
    <H2>FORMULARIO DE ASESORíA AL USUARIO</H2>
</div>

<table class="dis-table"  style="text-align:center;margin-top:30px;">
    <tr>
        <td style="font-weight:bold;">Fecha:</td>
        <td class=" "><?php echo $row['fecha_asesoria'];?></td>
        <td style="font-weight:bold;">Hora:</td>
        <td class=" "><?php echo $row['hora'];?></td>
    </tr>
</table>

<table class="dis-table"  style="border:1px solid gray;text-align:center;width: 100%;margin-top:15px;"> 
          <!--   <caption style="margin:10px;font-weight:bold;">Informacion del usuario</caption><br><br> -->
          
            <tr  class="tr-t" style="margin:10px;">
                <td class="td-d">
                    <div style="font-weight:bold;font-size:13px;">APELLIDOS Y NOMBRES</div>
                    <div><?php echo $row['nombresA']; ?></div>
                </td>
                <td class="td-d">
                    <div style="font-weight:bold;font-size:13px;">N° CÉDULA DE CIUDADANÍA</div>
                    <div><?php echo $row['cedula']; ?></div>
                </td>
                <td class="td-d">
                    <div style="font-weight:bold;font-size:13px;">FECHA DE NACIMIENTO</div>
                    <div><?php echo $row['fechaN']; ?></div>
                </td>
                <td class="td-d">
                    <div style="font-weight:bold;font-size:13px;">EDAD</div>
                    <div><?php echo $row['edad']; ?></div>
                </td>
            </tr>
            <tr class="tr-t">
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">NACIONALIDAD</div>
                    <div><?php echo $row['nacionalidad']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">ETNIA</div>
                    <div><?php echo $row['nombre_etnia']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">N° TELÉFONO</div>
                    <div><?php echo $row['telefono']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">GENERO</div>
                    <div><?php echo $row['genero_nombre']; ?></div>
                </td>
            </tr>

            <tr class="tr-t">
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">DOMICILIO</div>
                    <div><?php echo $row['domicilio']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">CORREO</div>
                    <div><?php echo $row['correo']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">ESTADO CIVIL</div>
                    <div><?php echo $row['estado_civil_nom']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">OCUPACION</div>
                    <div><?php echo $row['ocupacion_nombre']; ?></div>
                </td>
            </tr>
            <tr class="tr-t">
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">INSTRUCCION</div>
                    <div><?php echo $row['instrucion_nom']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">AFILIADO AL IEES</div>
                    <div><?php echo $row['iess']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">RECIBE BONO</div>
                    <div><?php echo $row['bono']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">CARNET DE DISCAPACIDAD</div>
                    <div><?php echo $row['discapacidad']; ?></div>
                </td>
            </tr>
            <tr class="tr-t">
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">NIVEL DE INGRESOS</div>
                    <div><?php echo $row['num_ingreso']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">ZONA DE VIVIENDA</div>
                    <div><?php echo $row['zonaV']; ?></div>
                </td>
                <td class="td-d">
                <div style="font-weight:bold;font-size:13px;">TIPO DE USUARIO</div>
                    <div><?php echo $row['tipo_usuario_nom']; ?></div>
                </td>
                <td class="td-d"> 
                <div style="font-weight:bold;font-size:13px;">MATERIA</div>
                    <div><?php echo $row['materia_nombre']; ?></div>
                </td>
            </tr>
        </table>

        
    <!--     <table class="dis-table"  style="border:1px solid gray;text-align:center;width: 100%;margin-top:10px;"> 
            <caption style="margin:10px;font-weight:bold;">RESUMEN DE LA CONSULTA</caption><br><br>
            <tr style="margin:10px;">
                <td>
                    <div>?php echo $row['resumen_consulta']; ?></div>
                </td>
            </tr>
        </table> -->
        <table class="dis-table"  style="border:1px solid gray;text-align:center;width: 100%;margin-top:10px;"> 
            <tr>
                <td class="td-d"> 
                <div style="font-weight:bold;font-size:13px;">RESUMEN DE LA CONSULTA</div>
                    <div><?php echo $row['resumen_consulta']; ?></div>
                </td>
            </tr>
            <tr>
                <td class="td-d"> 
                <div style="font-weight:bold;font-size:13px;">RESOLUCIÓN DE LA CONSULTA</div>
                    <div><?php echo $row['resolucion_consulta']; ?></div>
                </td>
            </tr>
        </table>

       <!--  <table style="border:1px solid gray;text-align:center;width: 100%;margin-top:15px;"> 
            <caption style="margin:10px;font-weight:bold;">RESOLUCIÓN DE LA CONSULTA</caption><br><br>
            <tr style="margin:10px;">
                <td>
                    <div>---------------------</div>
                </td>
            </tr>
        </table> -->

        <table style="text-align:center;width: 100%;margin-top:15px;"> 
            <caption style="margin-bottom:40px;font-weight:bold;">FIRMAS</caption><br><br>
            <tr>
                <td style="margin-top:30px;">
                    <div>----------------------------------------------</div>
                    <div>USUARIO<div>
                </td>
                <td style="margin-top:30px;">
                    <div>----------------------------------------------</div>
                    <div>SUPERVISOR INSTITUCIONAL<div>
                </td>
            </tr>
        </table>
        <table style="text-align:center;width: 100%;margin-top:10px;"> 
            <tr>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE<div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE <div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE<div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE <div>
                </td> 
            </tr>
            
        </table>
        <table style="text-align:center;width: 100%;margin-top:25px;"> 
            <tr>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE<div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE <div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE<div>
                </td>
                <td style="font-size:13px;">
                    <div>------------------------</div>
                    <div>PRACTICANTE <div>
                </td> 
            </tr>
            
        </table>


       


</body>
<!-- <script src="assets/panel/js/bootstrap.bundle.min.js"></script> -->
</html>

<?php
$html = ob_get_clean(); 
/* echo $html; */
require_once 'libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
/* 
$dompdf->loadHtml($html); */

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("Arhicvo_.pdf", array("Attachment" => false));

?>