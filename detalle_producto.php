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

    
    
    
?>

<link href="css/style.css" rel="stylesheet">

<div class="col-12 wow fadeInUp product-mod" data-wow-duration="1000ms" data-wow-delay="300ms">

                    <div class="row">
                      <div class="col-12 mod-img">
                          <img  class="img-responsive" src="images/productos/<?php echo $rs['route'];?>" alt="">
                        </a>
                      </div>
                        
                      
                            <div class="mod-body col-12">
                                <h3><a href="#"><?php echo $rs['nombre_producto']?></a></h3>
                                <h6><strong>Precio:</strong> $<?php echo $rs['precio_producto'];?></h6>
                                <h6><strong>Unidad:</strong> $<?php echo $rs['unidad_producto'];?></h6>
                                <h6><strong>Descripcion:</strong> <?= $rs['descripcion_producto']; ?></h6>    
                                <?php 
                                if($rs['stock']==1){ ?>
                            
                                <?php }else{?>
                                    <p><strong class="btn btn-danger">Sin Stock</strong></p>
                                <?php
                                }
                                ?>    
                                
                            </div> 
                       
                    </div> 
                  </div>
                 
                  

