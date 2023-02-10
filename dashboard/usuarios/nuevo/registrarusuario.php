<?php

if(isset($_POST["submit"])){

    $nombre=$_POST['unombre'];
    $apellido=$_POST['uapellido'];
    $usuario=$_POST['usuario'];
    $contra=sha1($_POST['contra']);
    $permisos=$_POST['radio1'];

    require("../../../php/conexion.php");

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexion ha fallado: " . $conn->connect_error);
    }

    $sql="INSERT INTO usuarios(nombre,apellido,nombreusuario,clave,idpermisos) VALUES ('$nombre','$apellido','$usuario','$contra','$permisos')";
    
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();

}
