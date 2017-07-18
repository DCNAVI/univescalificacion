<?php
if(isset($_POST['btnLogin'])){
        # Capturamos los datos del formulario
        $usernameLogin = $_POST['usernameLogin'];
        $passLogin = $_POST['passLogin'];
        
        # Hacemos una consulta que busque al usuario con los datos del formulario
        $userSearch = "SELECT COUNT(*) as total
                       FROM usuario
                       WHERE username = '{$usernameLogin}'
                       AND pass = md5('{$passLogin}');";
        # Mandamos la consulta a la BD
        $totalUsuario = $conexion->query($userSearch)->fetch_object();
        
        if($totalUsuario->total == 0){
            echo "EL USUARIO NO EXISTE <br />";
        }else{
            echo "PUEDES INICIAR SESION <br />";
            $userData = "SELECT idusuario, username, correo FROM usuario
                         WHERE username = '{$usernameLogin}'
                         AND pass = md5('{$passLogin}');";
            # Mandamos la consulta a la BD
            $usuario = $conexion->query($userData)->fetch_object();
            #Almacenamos los datos del usuario en variables de sesión
            $_SESSION['idusuario'] = $usuario->idusuario;
            $_SESSION['username'] = $usuario->username;
            $_SESSION['correo'] = $usuario->correo;
            
            #Redirigimos al usuario a timeLine.php
            header("Location: timeLine.php");
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
            Nombre de usuario <input type="text" name="nombreAlumno" required="Campo vacio"><br>
            Contraseña <input type="password" name="pass" required="Campo vacio"><br>
            <input type="submit" name ="btnRegistro" value="Registrar" >
        </form>



</body>
</html>