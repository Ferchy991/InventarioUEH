<?php
// Incluye las librerías PhpSpreadsheet y PDO
require_once '../../../php/vendor/autoload.php';

// Verifica si se ha subido un archivo y si no hay errores
if (isset($_FILES['subirarchivo']) && $_FILES['subirarchivo']['error'] == 0) {
    // Crea una instancia del objeto Spreadsheet para leer el archivo
    $archivo_excel = $_FILES['subirarchivo']['tmp_name'];
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo_excel);

    // Obtiene la hoja activa del archivo
    $worksheet = $spreadsheet->getActiveSheet();

    // Recorre las filas de la hoja y almacena los datos en la base de datos
    foreach ($worksheet->getRowIterator() as $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        $data = array();
        foreach ($cellIterator as $cell) {
            $data[] = $cell->getValue();
        }

        // Conecta a la base de datos utilizando PDO
        $dsn = 'mysql:host=localhost;dbname=bdinventario;charset=utf8mb4';
        $usuario = 'root';
        $contraseña = '';
        $pdo = new PDO($dsn, $usuario, $contraseña);

        // Prepara y ejecuta la consulta para insertar los datos en la tabla correspondiente
        $stmt = $pdo->prepare('INSERT INTO inventario_institucional(nombreproducto,descripcionproducto,codigoproducto,idbodega,stock) VALUES (?,?,?,?,?)');
        $stmt->execute($data);
    }

    // Redirecciona al usuario a una página de éxito
    header('Location: index.php');
    exit;
} else {
    // Si hay un error al subir el archivo, redirecciona al usuario a una página de error
    header('Location: error.php');
    exit;
}

$pdo=null;
