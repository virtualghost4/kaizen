<?php
session_start();
    include '../conexion.php';
?>


<?php 
      $id        = isset($_GET['id']) ? $_GET['id'] : 0;

      if ($_POST){

          $sql_update = 'UPDATE slider SET route_slider = ?, active = ? WHERE id = ?';

          $ruta_slider = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name'] : '';
          $tipo      = isset($_FILES['imagen']['type']) ? $_FILES['imagen']['type'] : '';
          $tamano    = isset($_FILES['imagen']['size']) ? $_FILES['imagen']['size'] : '';
          $activo    = isset($_POST['activo']) ? $_POST['activo'] : '';          

            if(trim($ruta_slider)!=''){
                $sql_update = 'UPDATE slider SET route_slider = ?, active = ? WHERE id = ?';
            }else{
                $sql_update = 'UPDATE slider SET active = ? WHERE id = ?';
            }


           if (($ruta_slider == !NULL) && ($_FILES['imagen']['size'] <= 6000000)) 
                    {
                       //indicamos los formatos que permitimos subir a nuestro servidor
                       if (($_FILES["imagen"]["type"] == "image/gif")
                       || ($_FILES["imagen"]["type"] == "image/jpeg")
                       || ($_FILES["imagen"]["type"] == "image/jpg")
                       || ($_FILES["imagen"]["type"] == "image/png"))
                       {
                              // Ruta donde se guardarán las imágenes que subamos
                              $directorio = $_SERVER['DOCUMENT_ROOT'].'/images/slider/';
                             // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                              echo 'subiendo';
                              move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$ruta_slider);
                              
                                $statement_update = $pdo->prepare($sql_update);
                                $statement_update->execute(array(
                                $ruta_slider,
                                $activo,
                                $id
                                ));


                            } 
                      else {
                               //si no cumple con el formato
                               echo "No se puede subir una imagen con ese formato ";
                               die("formato");
                            }
                }else{
                    //si existe la variable pero se pasa del tamaño permitido
                    #if($ruta_slider == !NULL) echo "La imagen es demasiado grande "; 
                    #die("tamaño");
                }
                
                if(trim($ruta_slider)==''){
                    $statement_update = $pdo->prepare($sql_update);
                    $statement_update->execute(array(
                    $activo,
                    $id
                 ));
                }

                          header('Location:read_slider.php');
              }


        if(isset($_GET['id'])){


        $sql_update = 'SELECT * FROM slider WHERE id = ?';
        $id_producto = isset($_GET['id']) ? $_GET['id'] : 0;

        $statement_update = $pdo->prepare($sql_update);
        $statement_update->execute(array($id));
        $result           = $statement_update->fetchAll();
        $rs               = $result[0];



    }

include 'partials/header.php';

?>

<div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item">Imagenes Slider</li>
                <li class="breadcrumb-item active">Actualizar</li>
            </ol>

            
            <!-- Contenido Formulario-->

            <h1>Imagenes de Slider</h1>
            

            <div class="container">
                <form enctype="multipart/form-data" method="post" >
                    <div class="form-group row">
                            <input type="file" name="imagen" class="btn btn-info form-control-file" id="exampleFormControlFile1">
                            <pre>
                              <?php echo $rs['route_slider']; ?>
                            </pre>
                    </div>
                    <label for="insert_active" class="col-md-1">Estado</label>
                          <select class="custom-select" name="activo">
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                          </select>

                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </div>
                    
                </form>
            </div>
           

        </div>
        <!-- /.container-fluid -->

    </div>
    

    <?php
    include 'partials/footer.php';
?>