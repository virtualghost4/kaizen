<?php 
 session_start();
include 'partials/header.php';?>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>

                <?php
                    include '../conexion.php';
                    
                    $sql       = 'SELECT COUNT(*) FROM productos';
                    $statement_productos = $pdo->prepare($sql);
                    $statement_productos->execute(array());
                    $result    = $statement_productos->fetchAll();
                    $total_productos = $result[0]['COUNT(*)'];

                    $sql       = 'SELECT COUNT(*) FROM slider WHERE active=1';
                    $statement_slider = $pdo->prepare($sql);
                    $statement_slider->execute(array());
                    $result    = $statement_slider->fetchAll();
                    $total_slider = $result[0]['COUNT(*)'];

                
                ?>

            <!-- Icon Cards -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-primary o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">
                                <?php echo $total_slider; ?> Fotos en Carousel
                            </div>
                        </div>
                        <a href="read_slider.php" class="card-footer clearfix small z-1">
                            <span class="float-left">View Details</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card card-inverse card-success o-hidden h-100">
                        <div class="card-block">
                            <div class="card-block-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">
                                <?php echo $total_productos; ?> Productos en lista.
                            </div>
                        </div>
                        <a href="read_productos.php" class="card-footer clearfix small z-1">
                            <span class="float-left">Ver detalles</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    

    <?php
    include 'partials/footer.php';
?>