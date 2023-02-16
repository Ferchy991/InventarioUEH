<?php
                // Verifica que se ha enviado el formulario y que se ha especificado un archivo para descargar
                if (isset($_POST['descargar']) && !empty($_POST['plantilla'])) {
                    // Obtiene la ubicación del archivo
                    $file = $_POST['plantilla'];

                    // Verifica que el archivo exista y sea accesible para la descarga
                    if (file_exists($file)) {
                        // Establece las cabeceras HTTP necesarias para que el navegador entienda que se está descargando un archivo
                        header('Content-Description: File Transfer');
                        header('Content-Type: application/octet-stream');
                        header('Content-Disposition: attachment; filename=' . basename($file));
                        header('Content-Transfer-Encoding: binary');
                        header('Expires: 0');
                        header('Cache-Control: must-revalidate');
                        header('Pragma: public');
                        header('Content-Length: ' . filesize($file));

                        // Lee y envía el archivo al navegador
                        readfile($file);
                        exit;
                    } else {
                        // Si el archivo no existe, muestra un mensaje de error
                        echo "El archivo no se encuentra disponible para descargar.";
                    }
                }
                ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Inventarios - Inventario Institucional</title>
    <link rel="icon" href="../../../assets/img/logo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../css/adminlte/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Ayuda</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link">
                <img src="../../../assets/img/logo.png" alt="Logo UEH" class="brand-image elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Inventarios - UEH</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../../assets/img/logo.png" class="img-circle elevation-2" alt="Perfil del usuario">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrador</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../../index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Menu Principal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="usuarios/nuevo/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nuevo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../lista/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>
                                    Bodegas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../bodegas/operaciones/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Operaciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-flag"></i>
                                <p>
                                    Reportes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Entradas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Salidas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Incidencias</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buscar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-boxes"></i>
                                <p>
                                    Inventario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>A la venta</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Institucional</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa regular fa-user-check"></i>
                                <p>
                                    Clientes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-parachute-box"></i>
                                <p>
                                    Proveedores
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">MÁS OPCIONES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-wrench"></i>
                                <p>
                                    Configuracion
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Cerrar sesion
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Inventario Institucional</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
                                <li class="breadcrumb-item active">Inventario</li>
                                <li class="breadcrumb-item active">Institucional</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">

                <!-- Input addon -->
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Registrar producto</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <h5>Datos del producto:</h5>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Nombre del producto" required name="pnombre">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-file"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Descripcion (70 caracteres máximo)" required name="pdescripcion">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Código de barras o Etiqueta" required name="pcodigo">
                            </div>


                            <div class="col-sm-12">
                                <!-- select -->
                                <div class="form-group">
                                    <label>Ubicación(Bodega)</label>
                                    <select class="form-control" name="pbodega" required>
                                        <option disabled selected>Selecciona una opción...</option>
                                        <?php
                                        require('../../../php/conexion.php');
                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                        if ($conn->connect_error) {
                                            die("La conexion ha fallado: " . $conn->connect_error);
                                        }
                                        $result = mysqli_query($conn, "SELECT * FROM bodegas");
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo ("<option value=" . $row['idbodega'] . ">" . $row['nombrebodega'] . "</option>");
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                                        </div>
                                        <input type="number" class="form-control" placeholder="Stock inicial" required name="pstock">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="archivo" name="archivo" required>
                                            <label class="custom-file-label" for="customFile">Subir Imagen...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-block btn-outline-success" name="submit" placeholder="Registrar">
                            <br>
                            <?php
                            include 'registrarproducto.php';
                            ?>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Alta Masiva de productos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form method="post">
                                <input type="hidden" name="plantilla" value="../../../assets/plantillas/subirproductoinstitucional.xlsx">
                                <button type="submit" class="btn btn-outline-success btn-block btn-flat" name="descargar"><i class="fas fa-download"></i> Descargar plantilla...</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="altamasiva.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="subirarchivo">
                                <button type="submit" class="btn btn-outline-success btn-block btn-flat"><i class="fas fa-upload"></i> Cargar archivo...</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Productos Registrados</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID Producto</th>
                                    <th>Nombre del producto</th>
                                    <th>Bodega</th>
                                    <th>Stock</th>
                                    <th>Operaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require('../../../php/conexion.php');
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("La conexion ha fallado: " . $conn->connect_error);
                                }
                                $result = mysqli_query($conn, "SELECT * FROM inventario_institucional INNER JOIN bodegas ON inventario_institucional.idbodega = bodegas.idbodega ORDER BY idproducto;");
                                while ($row = mysqli_fetch_array($result)) {
                                    echo ("<tr>");
                                    echo ("<td>" . $row['idproducto'] . "</td>");
                                    echo ("<td>" . $row['nombreproducto'] . "</td>");
                                    echo ("<td>" . $row['nombrebodega'] . "</td>");
                                    echo ("<td>" . $row['stock'] . "</td>");
                                    echo ("<td class='text-center'>");
                                    echo ("<div class='btn-group btn-group-sm'>");
                                    echo ("<a href='editar.php?id=" . $row['idproducto'] . "' class='btn btn-info'><i class='fas fa-eye'> Editar</i></a>");
                                    echo ("<a href='borrar.php?id=" . $row['idproducto'] . "' class='btn btn-danger'><i class='fas fa-trash'> Eliminar</i></a>");
                                    echo ("</div>");
                                    echo ("</td>");
                                }
                                mysqli_close($conn);
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID Producto</th>
                                    <th>Nombre del producto</th>
                                    <th>Bodega</th>
                                    <th>Stock</th>
                                    <th>Operaciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                uni.ueh.edu.mx
            </div>
            <!-- Default to the left -->
            <strong>Universidad Euro Hispanoamericana &copy; 2023</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../js/adminlte/adminlte.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- ChartJS -->
    <script src="../../../plugins/chart.js/Chart.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../../plugins/jszip/jszip.min.js"></script>
    <script src="../../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>