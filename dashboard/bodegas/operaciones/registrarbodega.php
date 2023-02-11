<?php
require('../../../php/conexion.php');

if (isset($_POST['submit'])) {
    $nombodega = $_POST['nbodega'];
    $ubibodega = $_POST['ubodega'];

    $conn=new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error) {
        die("La conexion ha fallado: " . $conn->connect_error);
    }

    $sql="INSERT INTO bodegas (nombrebodega,ubicacionbodega) VALUES ('$nombodega','$ubibodega')";
    if (mysqli_query($conn, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "" . mysqli_error($conn);
    }
    $conn->close();
}

?>