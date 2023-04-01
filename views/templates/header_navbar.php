
<?php 
   if (!isset($_SESSION)) {
      session_start();
   } ?>

<?php if(isset($_SESSION['login'])  && $_SESSION['login'] == true) { 
   
   $rol = (isset($_SESSION['rol_id']));  
            
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Consultorio Jurídico</title>
    <!--   <meta name="robots" content="noindex, nofollow"> -->
<!--       <meta content="" name="description">
      <meta content="" name="keywords"> -->
      <link href="assets/img/logo-ConUg.png" rel="icon">
      <link href="assets/panel/img/apple-touch-icon.png" rel="apple-touch-icon">
      <link rel="stylesheet" href="assets/css/designSpinner.css">

      <link href="assets/panel/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/panel/css/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/panel/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/panel/css/remixicon.css" rel="stylesheet">
      <link href="assets/panel/css/style.css" rel="stylesheet">

      <link rel="stylesheet" href="assets/css/StyleDashboard.css">
      <link rel="stylesheet" href="assets/css/designboton.css">

    <link rel="stylesheet" href="assets/sweetAlert/bootstrap.min.css"> 
<!--   <script type="text/javascript" src="assets/sweetAlert/sweetalert.min.js"></script>    -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>  
<link rel="stylesheet" href="assets/dataTables/datatables.min.css"> 
 <script src="assets/dataTables/datatables.min.js"></script>

 <script src="assets/dataTables/js/dataTables.buttons.min.js"></script>
 <script src="assets/dataTables/js/buttons.html5.min.js"></script>
 <script src="assets/dataTables/js/jszip.min.js"></script>
 <script src="assets/dataTables/js/pdfmake.min.js"></script>
 <script src="assets/dataTables/js/vfs_fonts.js"></script>

 <!-- Graficas chart js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<!-- Dependencias de DataTables -->
<link rel="stylesheet" href="assets/css-reportes/jquery-ui.css">
<link rel="stylesheet" href="assets/css-reportes/dataTables.jqueryui.min.css">
<link rel="stylesheet" href="assets/css-reportes/searchPanes.jqueryui.min.css">
<link rel="stylesheet" href="assets/css-reportes/select.jqueryui.min.css">
<link rel="stylesheet" href="assets/css-reportes/dataTables.dateTime.min.css">
<script src="assets/js-reportes/searchPanes.jqueryui.min.js"></script>
<script src="assets/js-reportes/dataTables.searchPanes.min.js"></script>
<script src="assets/js-reportes/dataTables.select.min.js"></script>
<script src="assets/js-reportes/moment.min.js"></script> 
<script src="assets/js-reportes/dataTables.dateTime.min.js"></script> 


<link href="assets/css/designChatbot.css" rel="stylesheet">
<script type="text/javascript" src="views/Chatbot/chatbot.js"></script>
   </head>

   <body>
      <header id="header" class="header fixed-top d-flex align-items-center">
         <div class="d-flex align-items-center justify-content-between"> 
            <a class="logo d-flex align-items-center">
            <img src="assets/img/logo-ConUg.png" alt="" >
               <span class="d-none d-lg-block">Consultorio Jurídico Gratuito UG</span></a>
               <i class="bi bi-list toggle-sidebar-btn"></i>
         </div>
        
         <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
               
               <li class="nav-item dropdown pe-3">
                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> 
                     <i class="ri-user-3-fill ri-lg"></i> 
 
                     <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['usuario'];?> </span> 
                   
                     
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                      <!--   <h6>?php echo $_SESSION['usuario'];?> </h6>
                        <span>?php echo $_SESSION['rol'];?></span> -->
                        

                        <div style="text-align:left;border-bottom: solid 1px;margin-bottom: 10px;color: #256D85;">
                  
	      <span style="font-weight:700;font-size:14px;text-transform: uppercase; " class="name"><?php echo $_SESSION['rol']; ?> </span>
      </div>

    
		  <div class="user-header" style="display:flex;">
              <img src="assets/img/usuario-i.png " alt="" style="height:50px;"> 
			  <span style="font-weight:700;font-size:15px;text-align:left;padding-left: 5px;"><?php echo $_SESSION['usuario'];?> <br> <span style="font-weight:500;font-size:15px;">  <?php echo $_SESSION['user'];  ?></span></span>  <br>
			
			</div>
         </li>


         <li>
            <hr class="dropdown-divider">
         </li>

         <li> 
            <a class="dropdown-item perfil d-flex align-items-center" href="index.php?c=Usuario&a=perfil_user&user_asesor=<?php echo $_SESSION['id'];?>" > 
               <i class="ri-profile-fill ri-lg"></i> 
               <span>Ver Perfil</span>
             </a>
         </li>

         <li> 
            <a class="dropdown-item d-flex align-items-center" href="index.php?c=login&a=salirLogin"> 
               <i class="bi bi-box-arrow-right"></i> 
               <span>Cerrar Sesión</span>
             </a>
         </li>


         </ul>
            </li>
      </ul>
   </nav>
</header>

      
<?php } 
else
header('Location:index.php?c=login&a=login' ); 
?> 