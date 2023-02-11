<?php

$idusuario=$_GET['id'];

$nomusuario=$_POST['unombre'];
$apusuario=$_POST['uapellido'];
$usuarioact=$_POST['usuario'];
$contract=$_POST['contra'];
$permact=$_POST['radio1'];

require('../../../php/conexion.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexion ha fallado: " . $conn->connect_error);
}

$sql="UPDATE usuarios SET  nombre='$nomusuario', apellido='$apusuario',nombreusuario='$usuarioact',clave='$contract'";

if (mysqli_query($conn, $sql)) {
    echo ("SE HA ACTUALIZADO EL USUARIO CORRECTAMENTE");
    header("location: index.php");
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>