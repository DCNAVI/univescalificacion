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
            $pass = $_POST['pass'];
            #Creamos un INSERT para agregar el usuario
            $insertUsuario="INSERT INTO alumno(nombreAlumno,periodo,correo,direccion,telefono,telEmergencia,pass)
                           VALUES('{$nombre}','{$periodo}','{$correo}','{$direccion}','{$telefono}','{$telEmergencia}',
                           md5('{$pass}'));";
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
            Nombre <input type="text" name="nombreAlumno" required="Campo vacio"><br>
    		Periodo <input type="text" name="periodo" required="Campo vacio"><br>
    		Correo <input type="text" name="correo" required="Campo vacio"><br>
    		Telefono <input type="text" name="telefono" required="Campo vacio"><br>
    		Escuela de Procedencia <input type="text" name="telEmergencia" required="Campo vacio"><br>
    		Dirección <input type="text" name="direccion" required="Campo vacio"><br>
            Contraseña <input type="password" name="pass" required><br>
            <input type="submit" name ="btnRegistro" value="Registrar" >

        </form>
</body>
</html>