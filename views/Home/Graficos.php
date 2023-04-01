<?php require_once 'config/Conexion.php' ?> 

<!-- ADMINISTRADOR -->
<?php if($_SESSION['rol_id']==1) { ?>

  <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title fw-bold">Cantidad de asesoria por Abogados</h5>
                        <div id="barChart"></div>
                        <script>document.addEventListener("DOMContentLoaded", () => {
                           new ApexCharts(document.querySelector("#barChart"), {
                             series: [{
                               data: [ <?php 
         $con = mysqli_connect('localhost','root','',"bd_consultorio");  
         $sql="SELECT usuario.nombre AS nombre, COUNT(*) AS cantidad_asesorias
         FROM asesoria
         INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario
         GROUP BY usuario.nombre";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "".$resultado['cantidad_asesorias'].","; 

         }
         ?> ]
                             }],
                             chart: {
                               type: 'bar',
                               height: 350
                             },
                             plotOptions: {
                               bar: {
                                 borderRadius: 4,
                                 horizontal: true,
                               }
                             },
                             dataLabels: {
                               enabled: false
                             },
                             xaxis: {
                               categories: [
                                 
                                
                                 <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
        /*  $sql = "SELECT * FROM asesoria
         INNER JOIN personal ON personal.id_personal = asesoria.fk_id_personal"; */
         $sql="SELECT usuario.nombre AS nombre, COUNT(*) AS cantidad_asesorias
         FROM asesoria
         INNER JOIN usuario ON usuario.id_usuario = asesoria.fk_id_usuario WHERE usuario.fk_rol='2'
         GROUP BY usuario.nombre
        ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "'".$resultado['nombre']."',"; 

         }
         ?> 

                               ],
                             }
                           }).render();
                           });
                        </script> 
                     </div>
                  </div>
               </div>
  
  <div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                 <h5 class="card-title fw-bold">Materias de Asesorías</h5>
            <div id="donutChart" style="min-height: 400px;" class="echart"></div>

            <script>document.addEventListener("DOMContentLoaded", () => {
                           echarts.init(document.querySelector("#donutChart")).setOption({
                             tooltip: {
                               trigger: 'item'
                             },
                             legend: {
                               top: '5%',
                               left: 'center'
                             },
                             series: [{
                               name: 'Materia Legal',
                               type: 'pie',
                               radius: ['40%', '70%'],
                               avoidLabelOverlap: false,
                               label: {
                                 show: false,
                                 position: 'center'
                               },
                               emphasis: {
                                 label: {
                                   show: true,
                                   fontSize: '18',
                                   fontWeight: 'bold'
                                 }
                               },
                               labelLine: {
                                 show: false
                               },
                               data: [ <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio");  
         $sql="SELECT materia.materia_nombre AS nombre_ma, COUNT(*) AS cantidad_asesorias
         FROM asesoria
         INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
         GROUP BY materia.materia_nombre
        ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        echo "{value:".$resultado['cantidad_asesorias'].",name:'" .$resultado['nombre_ma']."'},"; 
         }
         ?> 
                               ]
                             }]
                           });
                           });
            </script> 
        </div>
        </div>
    </div>


    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-bold">Asesorías y Patrocinios</h5>
            <div id="pieChart2"></div>

                <script>document.addEventListener("DOMContentLoaded", () => {
                           new ApexCharts(document.querySelector("#pieChart2"), {
                             series: [  <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
        /*  $sql = "SELECT * FROM asesoria
         INNER JOIN personal ON personal.id_personal = asesoria.fk_id_personal"; */
         $sql="SELECT 'asesoría' AS tipo, COUNT(*) AS cantidad
         FROM asesoria
         UNION ALL
         SELECT 'patrocinio' AS tipo, COUNT(*) AS cantidad
         FROM patrocinio
        ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "".$resultado['cantidad'].","; 

         }
         ?> ],
                             chart: {
                               height: 350,
                               type: 'pie',
                               toolbar: {
                                 show: true
                               }
                             },
                             labels: [
                              <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
        /*  SELECT COUNT(*) AS cantidad_asesorias
FROM asesoria
INNER JOIN personal ON personal.id_personal = asesoria.fk_id_personal; */
         $sql="SELECT 'asesoría' AS tipo, COUNT(*) AS cantidad
         FROM asesoria
         UNION ALL
         SELECT 'patrocinio' AS tipo, COUNT(*) AS cantidad
         FROM patrocinio
        ";

         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "['" .$resultado['tipo']."'],"; 

         }
         ?> 
                             ]
                           }).render();
                           });
                </script> 
            </div>
        </div>
    </div>
</div>
</div>

<!-- GRaficos de barra -->



<div class="row">

</div>
<?php } ?>

<!-- ASESORES -->
<?php if($_SESSION['rol_id']==2) { ?>
<div class="row">
<div class="col-lg-6">
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title fw-bold">Materias Legales</h5>
                        <div id="pieChart"></div>
                        <script>document.addEventListener("DOMContentLoaded", () => {
                           new ApexCharts(document.querySelector("#pieChart"), {
                             series: [  <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
        /*  $sql = "SELECT * FROM asesoria
         INNER JOIN personal ON personal.id_personal = asesoria.fk_id_personal"; */
         $sql="SELECT materia.materia_nombre AS nombre_ma, COUNT(*) AS cantidad_asesorias
         FROM asesoria
         INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
         GROUP BY materia.materia_nombre
        ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "".$resultado['cantidad_asesorias'].","; 

         }
         ?> ],
                             chart: {
                               height: 350,
                               type: 'pie',
                               toolbar: {
                                 show: true
                               }
                             },
                             labels: [
                              <?php 
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
        /*  $sql = "SELECT * FROM asesoria
         INNER JOIN personal ON personal.id_personal = asesoria.fk_id_personal"; */
         $sql="SELECT materia.materia_nombre AS nombre_ma, COUNT(*) AS cantidad_asesorias
         FROM asesoria
         INNER JOIN materia ON materia.id_materia = asesoria.fk_materia
         GROUP BY materia.materia_nombre
        ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "['" .$resultado['nombre_ma']."'],"; 

         }
         ?> 
                             ]
                           }).render();
                           });
                        </script> 
                     </div>
                  </div>
               </div>


<div class="col-lg-6">
   <div class="card">
      <div class="card-body">
         <h5 class="card-title fw-bold">Asesoramiento juridico</h5>
      <div id="lineChart"></div>
         <script>document.addEventListener("DOMContentLoaded", () => {
               new ApexCharts(document.querySelector("#lineChart"), {
                             series: [{
                               name: "Desktops",                         
                               data: [
                                 <?php 
                                   $id_asesor= $_SESSION['id'];
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
         $sql="SELECT MONTHNAME(fecha_asesoria) AS mes, COUNT(*) AS asesorias
         FROM asesoria WHERE fk_id_usuario=$id_asesor
         GROUP BY mes
         ORDER BY MONTH(fecha_asesoria) ";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "".$resultado['asesorias'].","; 

         }
         ?> 
                               ]
                             }],
                             chart: {
                               height: 350,
                               type: 'line',
                               zoom: {
                                 enabled: false
                               }
                             },
                             dataLabels: {
                               enabled: false
                             },
                             stroke: {
                               curve: 'straight'
                             },
                             grid: {
                               row: {
                                 colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                                 opacity: 0.5
                               },
                             },
                             xaxis: {
                               categories: [
                                 <?php 
  $id_asesor= $_SESSION['id'];
        $con = mysqli_connect('localhost','root','',"bd_consultorio"); 
         $sql="SELECT MONTHNAME(fecha_asesoria) AS mes, COUNT(*) AS asesorias
         FROM asesoria  WHERE fk_id_usuario=$id_asesor
         GROUP BY mes
         ORDER BY MONTH(fecha_asesoria)";
         $consulta = mysqli_query($con, $sql);
         while ($resultado = mysqli_fetch_assoc($consulta)){
        /*    echo "['" .$resultado['materia_nombre']."',".$resultado['cantidad_materias']."],"; */
        echo "['".$resultado['mes']."'],"; 

         }
         ?>
                              ],
                             }
                           }).render();
                           });
         </script> 
      </div>
   </div>
</div>
</div>

<?php } ?>