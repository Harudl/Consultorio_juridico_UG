<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/EstilosPrincipalG.css">
    <link rel="icon" href="assets/img/logo-ConUg.png" type="image/x-icon">
    <link href="assets/css/designChatbot.css" rel="stylesheet">
    <link href="assets/panel/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/panel/css/remixicon.css" rel="stylesheet">

    

<script type="text/javascript" src="assets/jquery/jquery.min.js"></script> 
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" src="views/Chatbot/chatbot.js"></script>


    <title>Consultorio Jurídico Gratuito UG</title>
</head>
<body>


<!--===================== HEADER ===================================== -->

   <?php require_once('views/principal/partials/BarraMenu.php'); ?>

<!-- ===================== HERO (PANTALLA PRINCIPAL) ===================================== --> 

   <?php require_once('views/principal/sectiones/HeroSection.php'); ?>

<!--===================== CHATBOT ===================================== -->

   <?php require_once('views/Chatbot/Chatbot.php'); ?>

<!-- ============================= SECCION QUIENES SOMOS ===================================== -->

   <?php require_once('views/principal/sectiones/NosotrosSection.php'); ?>
   

<!-- =================================== SERVICIOS ===================================== -->

   <?php require_once('views/principal/sectiones/ServiciosSection.php'); ?>

<!-- =============================== AREAS LEGALES ===================================== -->

   <?php require_once('views/principal/sectiones/AreasSection.php'); ?>

<!-- ================================== CONTACTO ===================================== -->

   <?php require_once('views/principal/sectiones/ContactosSection.php'); ?>
    
<!-- =============================== FOOTER ========================== -->

   <?php require_once('views/principal/partials/Footer.php'); ?>


<!-- file JAVASCRIPT -->
<script src="assets/js/script.js">
<script src="assets/panel/js/bootstrap.bundle.min.js"></script>

</script>

</body>
</html>
