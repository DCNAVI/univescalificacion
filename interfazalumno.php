<?php 
session_start();
    require_once('conexion.php');
     #si el usuario cerro sesion
    if (isset($_GET['salir'])) {
        #eliminar variables de sesion
        session_unset();

    }


 if (isset($_SESSION['idusuariose'])) {    

      // if (isset($_GET['user'])) {

  
 ?>


 <!DOCTYPE html>
<html>
<head>
  <title>Registros</title>
  <link rel= "stylesheet" href = "estilo.css"><!--llamamos la hoja de estilo css-->
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"> <!-- la pagina no sea escalable --> 
</head>
<body>
<div class="container">

  

 <h3>Bienvenido  <a href="veusuario.php?user=<?php echo $_SESSION['nombre'] ;?> "> <?php echo $_SESSION['nombre'] ;?>
<a href="loginAlumno.php?salir=1"> Cerrar Sesion</a>


<?php 

#hacemos una consulta que nos muestre todos los departamentos 
$vercalificacion = "SELECT idpaquete, peso, costo,fechaenvio FROM paquete
where iddestinatario= (SELECT iddestinatario from destinatario where nombre='{$_GET['user']}' );";
#mandamos la consulta a la bd de datos 
$resultadopaq = mysqli_query($conexion, $verpaq);

 if(isset($_POST['btnpaquete'])){
 ?>
 <center>
 <table>
  <tr>
  <th>ID</th>
  <th>Peso</th>
  <th>Costo</th>
  <th>Fecha</th>
  </tr>
  <?php 
  while ($paq= $resultadopaq->fetch_object()) {
   ?>
   <tr>
    <td><?php echo $paq->idpaquete;  ?></td>
    <td><?php echo $paq->peso;  ?></td>
    <td><?php echo $paq->costo;  ?></td>
       <td><?php echo $paq->fechaenvio;  ?></td>  

   </tr>
   <?php } ?>
 </table>
  </center>
<?php } ?>


<?php 

#hacemos una consulta que nos muestre todos los departamentos 
$verpers = "SELECT iddestinatario, nombre, telefono,calle,colonia, numerocasa,codigopostal FROM destinatario where nombre='{$_GET['user']}'
;";
#mandamos la consulta a la bd de datos 
$resultadopersona = mysqli_query($conexion, $verpers);

 if(isset($_POST['btndatos'])){
 

 ?>
 
 <center>
 <table>
  <tr>
  <th>ID</th>
  <th>Nombre</th>
  <th>Telefono</th>
 
  <th>Calle</th>
  <th>Colonia</th>
  <th>numcasa</th>
  <th>codigo postal</th>
 
    </tr>
  <?php 
  while ($people= $resultadopersona->fetch_object()) {
   ?>
   <tr>
    <td><?php echo $people->iddestinatario;  ?></td>
    <td><?php echo $people->nombre;  ?></td>
    <td><?php echo $people->telefono;  ?></td>
       <td><?php echo $people->calle;  ?></td>
       <td><?php echo $people->colonia;  ?></td> 
       <td><?php echo $people->numerocasa;  ?></td> 
      <td><?php echo $people->codigopostal;  ?></td> 
   </tr>
   <?php } ?>
 </table>
  </center>
<?php } ?>

<?php 

#hacemos una consulta que nos muestre todos los departamentos 
$verpers = "SELECT idrastreo, iddestinatario, idpaquete,idciudad,idestado FROM rastreo;";
#mandamos la consulta a la bd de datos 
$resultadopersona = mysqli_query($conexion, $verpers);

 if(isset($_POST['btnrastreos'])){
 
 ?>
 <center>
 <table>
  <tr>
  <th>ID rastreo</th>
  <th>id destinatario</th>
  <th>id paquete</th>
 
  <th>id ciudad </th>
  <th>id estado</th>
 
 
    </tr>
  <?php 
  while ($rastreos= $resultadopersona->fetch_object()) {
   ?>
   <tr>
    <td><?php echo $rastreos->idrastreo;  ?></td>
    <td><?php echo $rastreos->iddestinatario;  ?></td>
    <td><?php echo $rastreos->idpaquete;  ?></td>
       <td><?php echo $rastreos->idciudad;  ?></td>
       <td><?php echo $rastreos->idestado;  ?></td> 
      
   </tr>
   <?php } ?>
 </table>
  </center>
<?php } ?>

</body>
</html>
<?php  }else {header("location:loginAlumno.php"); } ?>