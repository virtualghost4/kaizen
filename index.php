<?php 


  include 'partials/navbar.php';
  include 'conexion.php';
  ?>

 <?php

                $sql       = 'SELECT * FROM productos WHERE status = 1 AND destacado = 1';
                $statement = $pdo->prepare($sql);
                $statement->execute(array());
                $result    = $statement->fetchAll();


                $sql       = 'SELECT * FROM slider WHERE active=1';
                $statement_count = $pdo->prepare($sql);
                $statement_count->execute();
                $rowCuenta = $statement_count->rowCount();
                $rt = $statement_count->fetchAll();

                $active = "active";

?>



      <div class="wrapper">
        <div class="main-part">
          <section>
            <div class="container carousel-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <?php 
                for($i=0; $i<$rowCuenta; $i++){
                  $active = "active";
                  ?>
                  <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i;?>" class="<?= $active?>"></li>
                  <?php
                  $active="";
                }
                ?>
                
            </ol>
            <div class="carousel-inner" role="listbox">
              <?php 
                  $active = "active";
                  foreach ($rt as $rtt){
              ?>
                <div class="carousel-item <?= $active?>" style="background-image: url('images/carousel/<?=$rtt['route_slider'];?>')">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <?php
                $active = "";
                  }
                ?>          
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
          </section>
            
          

          <section class="product-container">
            <div class="container">
              <div class="heading wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="3000ms">
                <div class="row">
                  <div class="text-center col-sm-12">
                    <h2>Productos Destacados</h2>
                  </div>
                </div> 
              </div> <!-- heading -->
              <div class="dishes-container">


                <div class="row">
                   <?php

                foreach($result as $rs)    {   
                ?>    
                  <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp product-content" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="dishes-list">
                      <div class="dishes-img">
                        
                          <img  class="productos desvanecer" src="images/productos/<?php echo $rs['route'];?>" alt="">

                          <div class="dishes_price">
                            <div class="dishes-price-content">
                              <div class="deshies-doll">$<?php echo $rs['precio_producto'];?></div>
                            </div> <!-- dishes-price-content -->
                          </div> <!-- dishes_price -->
                        <div class="product-details">
                          <p> <i class="fa fa-search"></i> </p>
                        </div>
                      </div> <!-- dishes-img -->
                      <div class="dishes-content">
                        <h3><a href="javascript:;"><?php echo $rs['nombre_producto']?></a></h3>
                        
                        <div class="options container-fluid">
                            <!--<button data-id="<?= $rs['id_producto']; ?>" class="btn btn-primary btn-black btn-detalles" data-toggle="modal" data-target="#myModal">
                              Ver Detalles</button>-->
                              <a href="detalle.php?id=<?php echo $rs['id_producto']; ?>"><button class="btn btn-primary btn-black btn-detalles">Detalle </button></a>
                              
                        </div>
                        
                      </div> <!-- dishes-content -->
                    </div> <!-- dishes-list -->
                  </div>
                 
                  <?php
            }
            ?>
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Detalles del producto</h4>
                  </div>
                  <div class="modal-body col-12">

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>  
                 
                 
                </div>
              </div> <!-- dishes-container -->
            </div>
          </section>
         
         
        </div> <!-- main-part -->
        
        <?php
          include 'partials/footer.php';
          ?>