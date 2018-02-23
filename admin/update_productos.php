<?php
session_start();
include '../conexion.php';

    

    if($_POST){        

        $sql_update = 'UPDATE productos SET nombre_producto = ? , precio_producto = ?, descripcion_producto = ?, unidad_producto = ?, categoria_producto = ?, route = ?, stock = ?, status = ?, destacado = ? WHERE id_producto = ?';

        $nombre_producto      =isset($_POST['nombre_producto']) ? $_POST['nombre_producto']: '';
        $precio_producto      =isset($_POST['precio_producto']) ? $_POST['precio_producto']: '';
        $descripcion_producto =isset($_POST['descripcion_producto']) ? $_POST['descripcion_producto']: '';
        $unidad_producto      =isset($_POST['unidad_producto']) ? $_POST['unidad_producto']: '';
        $categoria_producto   =isset($_POST['categoria_producto']) ? $_POST['categoria_producto']: '';
        $nombre_img           =isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name']: '';
        $tipo                 =isset($_FILES['imagen']['type']) ? $_FILES['imagen']['type']: '';
        $tamano               =isset($_FILES['imagen']['size']) ? $_FILES['imagen']['size']: '';
        $stock                =isset($_POST['stock']) ? $_POST['stock']: '';
        $status               =isset($_POST['status']) ? $_POST['status']: '';
        $destacado            =isset($_POST['destacado']) ? $_POST['destacado']: '';
        $id_producto          =isset($_GET['id']) ? $_GET['id'] : 0;

        if(trim($nombre_img)!=''){
            $sql_update = 'UPDATE productos SET nombre_producto = ? , precio_producto = ?, descripcion_producto = ?, unidad_producto = ?, categoria_producto = ?, route = ?, stock = ?, status = ?, destacado = ? WHERE id_producto = ?';
        }else{
            $sql_update = 'UPDATE productos SET nombre_producto = ? , precio_producto = ?, descripcion_producto = ?, unidad_producto = ?, categoria_producto = ?,  stock = ?, status = ?, destacado = ? WHERE id_producto = ?';
            
        }


        //Si existe imagen y tiene un tamaño correcto
        //  
        //        
                  $nombre_img= $_FILES['imagen']['name'];
                  /*
                  echo "<pre>";
                  print_R($_POST);
                  print_R($_FILES);
                  print_R($nombre_img);

                  die();
                  */

                    if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 2000000)) 
                    {

                       //indicamos los formatos que permitimos subir a nuestro servidor
                       if (($_FILES["imagen"]["type"] == "image/gif")
                       || ($_FILES["imagen"]["type"] == "image/jpeg")
                       || ($_FILES["imagen"]["type"] == "image/jpg")
                       || ($_FILES["imagen"]["type"] == "image/png"))
                       {
                          // Ruta donde se guardarán las imágenes que subamos
                          $directorio = $_SERVER['DOCUMENT_ROOT'].'/images/productos/';
                    
                         // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
                          move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                          
                            $statement_update = $pdo->prepare($sql_update);
                            if(trim($nombre_img)!=''){
                                $statement_update->execute(array(
                                    $nombre_producto,
                                    $precio_producto,
                                    $descripcion_producto,
                                    $unidad_producto,
                                    $categoria_producto,
                                    $nombre_img,
                                    $stock,
                                    $status,
                                    $destacado,
                                    $id_producto
                                ));
                            }else{
                                $statement_update->execute(array(
                                    $nombre_producto,
                                    $precio_producto,
                                    $descripcion_producto,
                                    $unidad_producto,
                                    $categoria_producto,
                                    $stock,
                                    $status,
                                    $destacado,
                                    $id_producto
                                ));
                            }

                  

                        } 
                        else 
                        {
                           //si no cumple con el formato                           
                           echo "No se puede subir una imagen con ese formato ";
                        }
                    } 
                    else 
                    {
                       //si existe la variable pero se pasa del tamaño permitido
                       if($nombre_img == !NULL) echo "La imagen es demasiado grande "; 
                    }


                    if(trim($nombre_img)==''){
                        $statement_update = $pdo->prepare($sql_update);
                        $statement_update->execute(array(
                            $nombre_producto,
                            $precio_producto,
                            $descripcion_producto,
                            $unidad_producto,
                            $categoria_producto,
                            $stock,
                            $status,
                            $destacado,
                            $id_producto
                        ));
                    }
                 
                header('Location:read_productos.php');
    }




    if(isset($_GET['id'])){


        $sql_update = 'SELECT * FROM productos WHERE id_producto = ?';
        $id_producto = isset($_GET['id']) ? $_GET['id'] : 0;

        $statement_update = $pdo->prepare($sql_update);
        $statement_update->execute(array($id_producto));
        $result           = $statement_update->fetchAll();
        $rs               = $result[0];



    }

include_once 'partials/header.php';
?>


    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item">Productos</li>
                <li class="breadcrumb-item active">Insertar</li>
            </ol>

            <!-- Contenido Formulario-->
            <h1>Productos</h1>
            <div class="container">
                <form enctype="multipart/form-data" method="post" >
                    <div class="form-group row">
                        <label for="insert_nombre" class="col-md-1">Nombre</label>
                        <input type="text" class="form-control col-md-5"  name="nombre_producto" value="<?php echo $rs['nombre_producto'] ?> ">
                        
                         <label for="insert_precio" class="col-md-1">Precio</label>
                        <input type="text" class="form-control col-md-3" name="precio_producto" value="<?php echo $rs['precio_producto'] ?>">
                    </div>
                    <div class="form-group row">
                         <label for="insert_descripcion" class="col-md-1">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion_producto" rows="3"><?php echo $rs['descripcion_producto'] ?>
                        </textarea>
                    </div>

                    <div class="form-group row">
                         <label for="insert_unidad" class="col-md-1">Unidad</label>
                        <input type="text" class="form-control col-md-5" name="unidad_producto" value="<?php echo $rs['unidad_producto'] ?>">

                         <label for="insert_categoria" class="col-md-1">Categoria</label>
                        
                        <?php 
                            if($rs['categoria_producto'] == 'Pescados'){
                        ?>
                         <select class="custom-select" name="categoria_producto">
                            <option value="Pescados" selected="selected">Pescados</option>
                            <option value="Mariscos">Mariscos</option>
                            <option value="Otros">Otros</option>
                          </select>
                          <?php }if($rs['categoria_producto'] == 'Mariscos'){
                            ?>
                            <select class="custom-select" name="categoria_producto">
                            <option value="Pescados" >Pescados</option>
                            <option value="Mariscos" selected="selected">Mariscos</option>
                            <option value="Otros">Otros</option>
                          </select>
                            <?php }if($rs['categoria_producto'] == 'Otros'){
                            ?>
                            <select class="custom-select" name="categoria_producto">
                            <option value="Pescados" >Pescados</option>
                            <option value="Mariscos">Mariscos</option>
                            <option value="Otros" selected="selected">Otros</option>
                          </select>
                          <?php }?>

                          <label for="update_stock" class="col-md-1">Stock</label>
                          <?php if($rs['stock'] == 0){
                            ?>
                            <select class="custom-select" name="stock">
                            <option value="0" selected="selected">Sin Stock</option>
                            <option value="1">En Stock</option>
                          </select>
                            <?php }if($rs['stock'] == 1){
                            ?>
                            <select class="custom-select" name="stock">
                            <option value="0">Sin Stock</option>
                            <option value="1" selected="selected">En stock</option>
                          </select>
                          <?php }?>
                    </div>
                    <div class="form-group row">

                            <label for="update_status" class="col-md-1">Status</label>
                          <?php if($rs['stock'] == 0){
                            ?>
                            <select class="custom-select" name="status">
                            <option value="0" selected="selected">Deshabilitado</option>
                            <option value="1">Habilitado</option>
                          </select>
                            <?php }if($rs['stock'] == 1){
                            ?>
                            <select class="custom-select" name="status">
                            <option value="0">Deshabilitado</option>
                            <option value="1" selected="selected">Habilitado</option>
                          </select>
                          <?php }?>

                          <label for="update_destacado" class="col-md-1" style="margin-right: 1rem;">Destacado</label>
                                
                          <?php
                          if($rs['destacado']==0){ ?>
                            <select class="custom-select col-2" name="destacado">
                                <option value="0" selected="selected">No Destacado</option>
                                <option value="1">Destacado</option>
                            </select>
                          <?php
                          }else{ ?>
                            <select class="custom-select col-2" name="destacado">
                                <option value="0">No Destacado</option>
                                <option value="1" selected="selected">Destacado</option>
                            </select>
                        <?php
                          }
                          ?>


                            
                    </div>

                    <div class="form-group row">
                        <input type="file" name="imagen" id="exampleFormControlFile1">
                    </div>


                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary" value="Modificar">
                    </div>
                </form>
            </div>
           

        </div>
        <!-- /.container-fluid -->
    </div>
    <?php
    include 'partials/footer.php';
?>