<?php
session_start();
	require_once('conexion.php');
	    if(isset($_POST['btnRegistro'])){

    	    $idMateria = $_POST['idMateria'];
        	$idMaestro = $_POST['idMaestro']; 
            $idAlumno   = $_POST['idAlumno']; 
            $calificacion  = $_POST['calificacion']; 
            #Creamos un INSERT para agregar el usuario
            $insertUsuario="INSERT INTO calificaciones(idMateria,idMaestro,idAlumno,calificacion)
                           VALUES({$idMateria},{$idMaestro},{$idAlumno},{$calificacion});";
            # Mandamos el INSERT a la BD               
            if($conexion->query($insertUsuario)){
                echo "MATERIA REGISTRADA CON EXITO<br />";   
            }else{
                echo $conexion->error;
            }
        }
?>
<!DOCTYPE html>
<html>
<head>  
<meta charset="utf-8">
	<title>Registro de materias</title>
<body>
Registro de materias
<form action ="#" method ="POST">
		ID Materia  <input type="text" name="idMateria"  required><br>
	    ID Maestro	<input type="text" name="idMaestro" required><br>
        ID Alumno   <input type="text" name="idAlumno" required><br>
        Calificacion    <input type="text" name="calificacion" required><br>
        <input type="submit" name ="btnRegistro" value="Registrar" >
</form>
</body>
</html>