<?php 
session_start();
    require_once('conexion.php');
    #si el usuario cerro sesion
    if (isset($_GET['salir'])) {
        #eliminar variables de sesion
       session_unset();
    }
  if (isset($_SESSION['expedientea'])) {  
    $nip=$_SESSION['expedientea'];
  $userData = "SELECT nombre FROM maestro
                         WHERE idmaestro= {$nip}";
 $usuario = $conexion->query($userData)->fetch_object();
   ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sesión de <?php echo $usuario->nombre; ?></title>
</head>
<body>
  Datos Personales
    </br> 
  <?php echo "bienvenido maestro".$usuario->nombre ;  ?>

  <?php 
  #hacemos una consulta que nos muestre las calificaciones
  $vercalificacion = "SELECT * FROM calificaciones, materia
  where idAlumno= (SELECT expediente from alumno where expediente= {$nip});";
  #mandamos la consulta a la bd de datos 
  $resultadopaq = mysqli_query($conexion, $vercalificacion)
 ?>
 <center>
  <table>
    <tr>
      <th>Materia</th>
      <th>Calificacion</th>
    </tr>
    <tr>
      <?php 
      while ($paq= $resultadopaq->fetch_object()) { ?>    
        <td><?php echo $paq->nombreMateria;  ?></td>
        <td><?php echo $paq->calFinal;
      ?></td>
    </tr>
    <?php }  ?>
  </table>
 </center>  
</body>
</html>
<?php  }else {header("location:loginMaestro.php"); } ?>