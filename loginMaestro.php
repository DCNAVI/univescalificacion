<?php
 session_start();
    require_once('conexion.php');
    if(isset($_POST['btnLogin'])){
        # Capturamos los datos del formulario
        $nombreAlumno1= $_POST['nombre'];
        $pass1= $_POST['pass'];
        $pass2= md5($pass1);
        # Hacemos una consulta que busque al usuario con los datos del formulario
        $userSearch = "SELECT COUNT(*) as total
                       FROM maestro
                       WHERE nombre = '{$nombreAlumno1}'
                       AND pass='{$pass2}';";
        # Mandamos la consulta a la BD
        $totalUsuario = $conexion->query($userSearch)->fetch_object();
        if($totalUsuario->total == 0){
            echo "EL USUARIO NO EXISTE <br />";
            echo $userSearch;
            }else{
                        echo "Login correcto! <br />";
        }
    }
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
    <title>login</title>
</head>
<body>
        <form action ="#" method ="POST">
            Nombre de usuario <input type="text" name="nombre" ><br>
            Contraseña <input type="password" name="pass"><br>
            <input type="submit" name ="btnLogin" value="Registrar" >
        </form>
</body>
</html>