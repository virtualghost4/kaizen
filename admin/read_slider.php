<?php
session_start();
include 'partials/header.php';?>
   
   <script>
       function delete_slider(id_to_delete){
           var confirmation = confirm('¿Seguro que desea eliminar la foto '+ id_to_delete );
           
           if(confirmation){
            window.location = "delete_slider.php?id="+id_to_delete;
           } 
       }
   </script>
    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active">Carousel</li>
            </ol>

            <?php
                    include '../conexion.php';
                    
                    $sql       = 'SELECT * FROM slider';
                    $statement = $pdo->prepare($sql);
                    $statement->execute(array());
                    $result    = $statement->fetchAll();
                
                ?>
            <!-- Tabla-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Slider
                    <a class="btn btn-primary float-right" href="insert_slider.php">Agregar</a>
                </div>
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Archivo</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php  foreach($result as $rs){ ?>
                                <tr>
                                    <td><?php echo $rs['route_slider']?></td>
                                    <td><?php 
                                    if($rs['active']==0){
                                        echo 'inactivo';
                                    }else{
                                        echo 'activo';
                                    }
                                    ?></td>
                                    <td><a class="btn btn-warning" href="update_slider.php?id=<?php echo $rs['id']; ?> "> <i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" onclick="delete_slider(<?php echo $rs['id']; ?>)" href="#"> <i class="fa fa-times"></i></a>
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