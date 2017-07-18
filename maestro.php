<?php
	    session_start();
	require_once('conexion.php');
	    if(isset($_POST['btnRegistro'])){
    	    $nombre = $_POST['nombre'];
        	$correo = $_POST['correo']; 
        	$pass = $_POST['pass'];
        	

            #Creamos un INSERT para agregar el usuario
            $insertUsuario="INSERT INTO maestro(nombre,correo,pass)
                           VALUES('{$nombre}','{$correo}',md5('{$pass}'));";
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
<head>
<meta charset="utf-8">
	<title>Registro Maestro</title>
<body>
<h2>Registro de Maestros</h2>
<form action ="#" method ="POST">
		<h2>Nombre <input type="text" name="nombre"  required></h2>
		<h2>Correo  <input type="text" name="correo" required></h2>
		<h2>Contraseña<input type="text" name="pass" required></h2>
		<input type="submit" name ="btnRegistro" value="Registrar" >
</form>
</body>
</html>