<?php
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    } else {
       echo "Esta pagina es solo para usuarios registrados.<br>";
       echo "<br><a href='../login.php'>Login</a>";
       echo "<br><br><a href='../index.php'>Registrarme</a>";
    exit;
    }
    $now = time();
    if($now > $_SESSION['expire']) {
    session_destroy();
     
    echo "Su sesion a terminado,
    <a href='../login.php'>Necesita Hacer Login</a>";
    exit;
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>PANEL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- fileinput CSS -->
    <link href="css/fileinput.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="../js/alerts.js" ></script>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"><img src="../../img/logo.svg" alt="" style="max-width: 2.5rem;"></a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="read_productos.php"><i class="fa fa-fw fa-shopping-basket"></i> Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="read_slider.php"><i class="fa fa-fw fa-area-chart"></i> Carousel</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                
               
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>