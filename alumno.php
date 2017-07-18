<?php
	    session_start();
	require_once('conexion.php');

	    if(isset($_POST['btnRegistro'])){
    	    $nombre = $_POST['nombreAlumno'];
        	$periodo = $_POST['periodo'];
        	$correo = $_POST['correo'];
        	$telefono = $_POST['telefono'];
        	$telEmergencia = $_POST['telEmergencia'];
        	$direccion = $_POST['direccion'];
  
        #Creamos un INSERT para agregar el usuario
            $insertUsuario="INSERT INTO alumno(nombreAlumno,periodo,correo,direccion,telefono,telEmergencia)
                           VALUES('{$nombre}','{$periodo}','{$correo}','{$direccion}','{$telefono}','{$telEmergencia}');";
      
         # Mandamos el INSERT a la BD               
            if($conexion->query($insertUsuario)){
                echo "USUARIO REGISTRADO CORRECTAMENTE<br />";   
            }else{
                echo $conexion->error;
            }
        }
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<title>Registro alumno</title>
<body>
<h2>Bienvenido, en esta sección te podrás registrar para saber tu estado actual academico</h2>
<form action ="#" method ="POST">
        Telefono de Emergencia <input type="text" class="form-control" placeholder="Campo de texto" required="campo vacio"><br>
		Nombre <input type="text" name="nombreAlumno" placeholder="Ingresa tu nombre"><br>
		Periodo <input type="text" name="periodo" placeholder="Ingresa el cuatrimestre"><br>
		Correo <input type="text" name="correo" placeholder="ingresa tu correo "><br>
		Telefono <input type="text" name="telefono" placeholder="Ingresa tu telefono"><br>
		Télefono de Emergencia <input type="text" name="telEmergencia" placeholder="Ingresa telefono de emergencia"><br>
		Dirección <input type="text" name="direccion" placeholder="Ingresa tu dirección"><br>
		<input type="submit" name ="btnRegistro" value="Registrar">
</form>
</body>
</html>