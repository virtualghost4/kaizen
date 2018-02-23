<?php
session_start(); 
include 'partials/header.php';?>
   
   <script>
       function delete_productos(id_to_delete){
           var confirmation = confirm('¿Seguro que desea eliminar el producto '+ id_to_delete );
           
           if(confirmation){
            window.location = "delete_productos.php?id="+id_to_delete;
           } 
       }
   </script>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>

            <?php
                    include '../conexion.php';
                    
                    $sql       = 'SELECT * FROM productos';
                    $statement = $pdo->prepare($sql);
                    $statement->execute(array());
                    $result    = $statement->fetchAll();
                
                ?>
            <!-- Tabla-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Productos
                    <a class="btn btn-primary float-right" href="insert_productos.php">Agregar</a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Unidad</th>
                                    <th>Categoria</th>
                                    <th>Stock</th>
                                    <th>Habilitado</th>
                                    <th>Destacado</th>
                                    <th>Foto</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  foreach($result as $rs){ ?>
                                <tr>
                                    <td><?php echo $rs['nombre_producto']?></td>
                                    <td><?php echo $rs['precio_producto']?></td>
                                    <td><?php echo $rs['unidad_producto']?></td>
                                    <td><?php echo $rs['categoria_producto']?></td>
                                    <td><?php if ($rs['stock']==1){
                                        echo 'En Stock';
                                    }else{
                                        echo 'Sin Stock';
                                    }

                                    ?></td>
                                    <td><?php 
                                    if ($rs['status']==1){
                                        echo 'Habilitado';
                                    }else{
                                        echo 'Deshabilitado';
                                    }
                                    ?></td>
                                    <td>
                                        <?php if ($rs['destacado']==1){
                                                    echo 'Destacado';
                                                }else{
                                                    echo 'No Destacado';
                                                }

                                        ?>
                                    </td>
                                    <td><?php echo $rs['route']?></td>

                                    <td><a class="btn btn-warning" href="update_productos.php?id=<?php echo $rs['id_producto']; ?> "> <i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" onclick="delete_productos(<?php echo $rs['id_producto']; ?>)" href="#"> <i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    
	<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <?php


    include 'partials/footer.php';
?>