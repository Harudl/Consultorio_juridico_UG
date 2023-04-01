<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'bd_consultorio';
$conn = mysqli_connect($host, $user, $password, $database);

// Verificar si el usuario existe en la base de datos
$cedula = $_POST['cedula'];
$query = "SELECT * FROM interesado WHERE cedula = '$cedula'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  echo '<em style="color:#fe5f55;font-weight: bold;">Ya existe el usuario</em>';
} /* else {
  echo '<p style="color:#fe5f55;">Usuario no encontrado</p>';
} */

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

