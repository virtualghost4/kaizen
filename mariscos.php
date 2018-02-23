<?php 
  include 'partials/navbar.php';
  include 'conexion.php';
  ?>

 <?php

                $sql       = 'SELECT * FROM productos WHERE categoria_producto = \'Mariscos\' AND status = 1  ';
                $statement = $pdo->prepare($sql);
                $statement->execute(array());
                $result    = $statement->fetchAll();

?>

      <div class="wrapper">
        <div class="main-part">
          <section>
            
          </section>
            
          

          <section class="product-container">
            <div class="container">
              <div class="heading wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="3000ms">
                <div class="row">
                  <div class="text-center col-sm-12">
                    <h2>Mariscos</h2>
                  </div>
                </div> 
              </div> <!-- heading -->
              <div class="dishes-container">


                <div class="row">
                   <?php

                foreach($result as $rs)    {   
                ?>    
                  <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="dishes-list">
                      <div class="dishes-img">
                          <img  class="productos" src="images/productos/<?php echo $rs['route'];?>" alt="">

                          <div class="dishes_price">
                            <div class="dishes-price-content">
                              <div class="deshies-doll">$<?php echo $rs['precio_producto'];?></div>
                            </div> <!-- dishes-price-content -->
                          </div> <!-- dishes_price -->
                        </a>
                      </div> <!-- dishes-img -->
                      <div class="dishes-content">
                        <h3><a href="javascript:;"><?php echo $rs['nombre_producto']?></a></h3>
                        <a href="detalle.php?id=<?php echo $rs['id_producto']; ?>"><button class="btn btn-primary btn-black btn-detalles">Detalle </button></a>
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
                  <div class="modal-body">

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