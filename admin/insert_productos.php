<?php 
session_start();
    include '../conexion.php';
?>

<?php

              /*  $sql       = 'SELECT * FROM productos';
                $statement = $pdo->prepare($sql);
                $statement->execute(array());
                $result    = $statement->fetchAll();*/

if($_POST){
                $sql_insert= 'INSERT INTO productos (nombre_producto,precio_producto,descripcion_producto,unidad_producto,categoria_producto,route, stock, status, destacado) VALUES (?,?,?,?,?,?,?,?,?)';


                $nombre_producto      = isset($_POST['nombre_producto']) ? $_POST['nombre_producto']: '';
                $precio_producto      = isset($_POST['precio_producto']) ? $_POST['precio_producto']: '';
                $descripcion_producto = isset($_POST['descripcion_producto']) ? $_POST['descripcion_producto']: '';
                $unidad_producto      = isset($_POST['unidad_producto']) ? $_POST['unidad_producto']: '';
                $categoria_producto   = isset($_POST['categoria_producto']) ? $_POST['categoria_producto']: '';
                $nombre_img           = isset($_FILES['imagen']['name']) ? $_FILES['imagen']['name']: '';
                $tipo                 = isset($_FILES['imagen']['type']) ? $_FILES['imagen']['type']: '';
                $tamano               = isset($_FILES['imagen']['size']) ? $_FILES['imagen']['size']: '';
                $stock                = isset($_POST['stock']) ? $_POST['stock']: '';
                $status               = isset($_POST['status']) ? $_POST['status']: '';
                $destacado            = isset($_POST['destacado']) ? $_POST['destacado']: '';  
 
                    //Si existe imagen y tiene un tamaño correcto
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
                          echo 'subiendo';
                          move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
                          
                            $statement_insert = $pdo->prepare($sql_insert);
                            $statement_insert->execute(array(
                            $nombre_producto,
                            $precio_producto,
                            $descripcion_producto,
                            $unidad_producto,
                            $categoria_producto,
                            $nombre_img,
                            $stock,
                            $status,
                            $destacado
                            ));


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

                header('Location:read_productos.php');
         }

include 'partials/header.php';
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
                        <input type="text" class="form-control col-md-5"  name="nombre_producto">
                        
                         <label for="insert_precio" class="col-md-1">Precio</label>
                        <input type="text" class="form-control col-md-3" name="precio_producto">
                    </div>
                    <div class="form-group row">
                         <label for="insert_descripcion" class="col-md-1">Descripción</label>
                        <textarea type="text" class="form-control" name="descripcion_producto" rows="3"> </textarea>
                    </div>

                    <div class="form-group row">
                         <label for="insert_unidad" class="col-md-1">Unidad</label>
                        <input type="text" class="form-control col-md-5" name="unidad_producto">

                         <label for="insert_categoria" class="col-md-1">Categoria</label>
                          <select class="custom-select" name="categoria_producto">
                            <option value="Pescados">Pescados</option>
                            <option value="Mariscos">Mariscos</option>
                            <option value="Otros">Otros</option>
                          </select>

                          <label for="update_stock" class="col-md-1">Stock</label>
                          
                            <select class="custom-select" name="stock">
                            <option value="0" selected="selected">Sin Stock</option>
                            <option value="1">En Stock</option>
                          </select>
                                                

                    </div>

                    <div class="form-group row">

                            <label for="update_status" class="col-md-1">Status</label>
                          
                            <select class="custom-select" name="status">
                                <option value="0" selected="selected">Deshabilitado</option>
                                <option value="1">Habilitado</option>
                            </select>
                            
                            <label for="insert_destacado" class="col-md-1" style="margin-right: 1rem;">Destacado</label>
                          
                            <select class="custom-select col-2" name="destacado">
                                <option value="0" selected="selected">No Destacado</option>
                                <option value="1">Destacado</option>
                            </select>
        
                    </div>

                    <div class="form-group row">
                    <input type="file" name="imagen" class="btn btn-info form-control-file" id="exampleFormControlFile1">
                    </div>

                    <div class="form-group row">
                        <input type="submit" class="btn btn-primary" value="Agregar">
                    </div>
                </form>
            </div>
           

        </div>
        <!-- /.container-fluid -->

    </div>
    

    <?php
    include 'partials/footer.php';
?>