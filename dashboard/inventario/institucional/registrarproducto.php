<?php

if (isset($_POST["submit"])) {

    require('../../../php/conexion.php');

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("La conexion ha fallado: " . $conn->connect_error);
    }

    
    $nombreproducto = $_POST['pnombre'];
    $descripcionproducto = $_POST['pdescripcion'];
    $codigoproducto = $_POST['pcodigo'];
    $ubicacionproducto = $_POST['pbodega'];
    $stockproducto = $_POST['pstock'];
    $rutacodigo='barcode.php?codetype=Code128&size=50&text='.$codigoproducto.'&print=true';

    $taget_dir_img = "../../../assets/i_institucional/";
    $target_file = $taget_dir_img . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["archivo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["archivo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    ) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO inventario_institucional(nombreproducto,descripcionproducto,codigoproducto,imgcodigo,idbodega,stock,rutaimg) VALUES 
            ('$nombreproducto','$descripcionproducto','$codigoproducto','$rutacodigo','$ubicacionproducto','$stockproducto','$target_file')";

            if (mysqli_query($conn, $sql)) {
                echo "<center><img alt='testing' src='barcode.php?codetype=code39&size=50&text=".$codigoproducto."&print=true'/></center>";
            } else {
                echo "Error: " . $sql . "" . mysqli_error($conn);
            }
            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
