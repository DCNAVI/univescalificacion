<?php
    #Creamos la conexion con la base de datos
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "unives";
    
    $conexion = new mysqli($host,$user,$pass,$database);
    
    #Si hay algún error en la conexión lo imprimimos
    if($conexion->connect_errno){
        echo $conexion->error."<br />";
    }
    
?>