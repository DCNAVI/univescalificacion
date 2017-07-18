<?php
	    session_start();
	require_once('conexion.php');
	    if(isset($_POST['btnRegistro'])){
    	    $nombre = $_POST['nombreMateria'];
        	$correo = $_POST['idMateria']; 
            #Creamos un INSERT para agregar el usuario
            $insertUsuario="INSERT INTO materia(nombreMateria,idMateria)
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
		Nombre Materia <input type="text" name="nombreMateria"  required><br>
		Id Materia  <input type="text" name="idMateria" required><br>
        <input type="submit" name ="btnRegistro" value="Registrar" >
</form>
</body>
</html>