<?php

$nbodega=$_POST['nbodega'];
$ubodega=$_POST['ubodega'];

require('../../../php/conexion.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexion ha fallado: " . $conn->connect_error);
}

$sql="UPDATE bodegas SET  nombrebodega='$nbodega', ubicacionbodega='$ubodega'";

if (mysqli_query($conn, $sql)) {
    echo ("SE HA ACTUALIZADO EL USUARIO CORRECTAMENTE");
    header("location: index.php");
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>