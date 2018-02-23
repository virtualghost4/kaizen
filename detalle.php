<?php 

    include 'conexion.php';

    if(isset($_GET['id'])){


        $sql = 'SELECT * FROM productos WHERE id_producto = ?';
        $id_producto = strlen($_GET['id']) !=0 ? $_GET['id'] : 0;

        $statement = $pdo->prepare($sql);
        $statement->execute(array($id_producto));
        $result           = $statement->fetchAll();
        $rs               = $result[0];
        
    }

    
   

    include 'partials/navbar.php';
?>
          <section>
            <div class="container container-details">
              <div class=" col-12 heading wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                                
              <div class="row details-row">
                      <div class="col-sm-6 col-12 column-details">
                          <img  class="img-responsive" src="images/productos/<?php echo $rs['route'];?>" alt="">
                        </a>
                      </div>
                        
                      
                            <div class="col-sm-6 col-12 column-details">
                                <h3><a href="#"><?php echo $rs['nombre_producto']?></a></h3>
                                <h6><strong>Precio:</strong> $<?php echo $rs['precio_producto'];?></h6>
                                <h6><strong>Unidad:</strong> <?php echo $rs['unidad_producto'];?></h6>
                                <h6><strong>Descripcion:</strong> <?= $rs['descripcion_producto']; ?></h6>    
                                <?php 
                                if($rs['stock']==1){ ?>
                                    <p><strong class="btn btn-success">En Stock</strong></p>
                                <?php }else{?>
                                    <p><strong class="btn btn-danger">Sin Stock</strong></p>
                                <?php
                                }
                                ?>    
                                
                            </div> 
                       
                    </div> 
               
              </div>
            </div>
          </section>
         
         


<?php

    include'partials/footer.php';

    ?>