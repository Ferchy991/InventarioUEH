<?php
$idproducto=$_GET['id'];
require('../../../php/conexion.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexion ha fallado: " . $conn->connect_error);
}

$sql="DELETE FROM inventario_venta WHERE idproductoventa='$idproducto'";

if (mysqli_query($conn, $sql)) {
    header("location: index.php");
} else {
    echo "Error: " . $sql . "" . mysqli_error($conn);
}
$conn->close();

?>