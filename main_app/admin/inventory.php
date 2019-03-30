<?php
include '../../include/controller.php';
/*$sesion_username = $_SESSION['username'];
$sesion_role = $_SESSION['role'];
if(empty($_SESION['username'])){
    header("location:../../login.php");
}*/
?>
<!DOCTYPE html>
<html lang="es">
<meta charset="UTF-8" />
<head>
    <title>Inventario de Discos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/style_in.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../css/loader.css">
    <script src="../../js/jquery-1.12.4.js"></script>
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
        });
    </script>
    <link rel="stylesheet" href="../../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../../css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../css/responsive.bootstrap.min.css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>

</head>

<body onload="myFunction()" style="margin:0;">

    <div class="container">      
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><span class='glyphicon glyphicon-user' aria-hidden='true'></span>
                <?php echo "Activo"; ?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="#logout" data-toggle="modal"><span class='glyphicon glyphicon-log-out' aria-hidden='true'></span> Cerrar Sesión</a>
                </li>
            </ul>
            <!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Añadir <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#add" data-toggle="modal">Producto</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#disquera" data-toggle="modal">Disquera</a></li>
                    <li><a href="#genero" data-toggle="modal">Genero</a></li>
                    <li><a href="#artista" data-toggle="modal">Artista</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-warning dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Vender <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="../../carrito/index.php" data-toggle="modal">Ir a sitio</a></li>
                </ul>
            </div>

        </div>
               
        <br>
        <p>Panel de Control</p>
        <br>
        <table id="example" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Album</th>
                    <th>Artista</th>
                    <th>Genero</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Portada</th>
					<th>Acciones</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Album</th>
                    <th>Artista</th>
                    <th>Genero</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Portada</th>
					<th>Acciones</th>
                </tr>
            </tfoot>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM vw1;";//id_album, nombre, NA, NG, precio, fotografia, qty
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            $id = $row['id_album'];
                            $item_name = $row['nombre'];
                            $item_code = $row['NA'];
                            $item_category = $row['NG'];
                            $item_dis = $row['ND'];
                            $item_date = $row['FP'];
                            $item_d = $row['descripcion'];
                            $item_description = $row['precio'];
                            $item_image = $row['fotografia'];
                            $qty = $row['qty'];

                            if($qty == 0){
                                $alert = "<div class='alert alert-danger'>
                                <strong>$qty</strong> No Stock
                                </div>";
                            }else {
                                $alert = $qty;
                            }

                    ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $item_name; ?>
                    </td>
                    <td>
                        <?php echo $item_code; ?>
                    </td>
                    <td>
                        <?php echo $item_category; ?>
                    </td>
                    <td>
                        <?php echo $item_description; ?>
                    </td>
                    <td>
                        <?php echo $alert; ?>
                    </td>
                    <td>
                        <img src="../../resources/album/<?php echo $item_image; ?>" class="img-thumbnail" width="60" height="45">
                    </td>
                    <td>
                        <a href="#out<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-default btn-sm'><span class='glyphicon glyphicon-minus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#add<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-plus' aria-hidden='true'></span></button>
                        </a>
                        <a href="#edit<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button>
                        </a>
                        <a href="#delete<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
                        </a>
                        <a href="#watch<?php echo $id;?>" data-toggle="modal">
                            <button type='button' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></button>
                        </a>
                    </td>

                    <!--Ver Los Productos -->
                    <div id="watch<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" class="form-horizontal" role="form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Detalles</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Album:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Precio:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_description; ?>"> 
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Artista:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_code; ?>">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Fecha:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $item_date; ?>"> 
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Genero:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_category; ?>">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Stock:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_code" name="item_code" value="<?php echo $qty; ?>"> 
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Disquera:</label>
                                            <div class="col-sm-4">
                                                <input type="text" readonly class="form-control" id="item_name" name="item_name" value="<?php echo $item_dis; ?>">
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Portada:</label>
                                            <div class="col-sm-4">
                                                <img src="../../resources/album/<?php echo $item_image; ?>" class="img-thumbnail" width="55" height="55">
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Description:</label>
                                            <div class="col-sm-10">
                                                <textarea readonly class="form-control" id="item_description" name="item_description" autocomplete="off"  required style="width: 100%;"><?php echo $item_d; ?>
                                                </textarea>
                                            </div>            
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Salir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Editar Elemento -->
                    <div id="edit<?php echo $id; ?>" class="modal fade" role="dialog">
                        <form method="post" class="form-horizontal" role="form">
                            <div class="modal-dialog modal-lg">
                                 <!-- Contenedor-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Editar Item</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_item_id" value="<?php echo $id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Album:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $item_name; ?>" placeholder="Nombre" required autofocus> 
                                                </div>
                                                <label class="control-label col-sm-2" for="item_code">Precio:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="item_code" name="item_code" value="<?php echo $item_description; ?>" placeholder="$00.00" required> 
                                                </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Artista:</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="item_art" name="item_art">
                                                    <option value="<?php echo $id_ar; ?>"><?php echo $item_code; ?></option>
                                                        <?php 
                                                            $result2 = $conn->query($sql2);
                                                            
                                                            while($row = $result2->fetch_assoc()) {  
                                                            $id_ar = $row['id_artista']; 
                                                            $name_ar = $row['nombre'];

                                                        ?>
                                                    <option value="<?php echo $id_ar; ?>"><?php echo $name_ar;?></option>    
                                                    <?php } ?>
                                                </select>    
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Fecha:</label>
                                            <div class="col-sm-4">
                                                <input type="date" class="form-control"  id="item_date" name="item_date" value="<?php echo $item_date; ?>"> 
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Genero:</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="item_gen" name="item_gen">
                                                    <option value="<?php echo $id_ge; ?>"><?php echo $item_category; ?></option>
                                                        <?php 
                                                                    
                                                            $result1 = $conn->query($sql1);
                                                            
                                                            while($row = $result1->fetch_assoc()) {  
                                                            $id_ge = $row['id_genero']; 
                                                            $name_ge = $row['nombre'];

                                                        ?>
                                                    <option value="<?php echo $id_ge; ?>"><?php echo $name_ge;?></option>    
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                            <label class="control-label col-sm-2" for="item_category">Stock:</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" id="quantity" readonly name="quantity" placeholder="0" autocomplete="off" min="0" value="<?php echo $qty; ?>"> 
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Disquera:</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" id="item_dis" name="item_dis">
                                                        <option value="<?php echo $id_dis; ?>"><?php echo $item_dis; ?></option>
                                                            <?php 
                                                                    
                                                                $result3 = $conn->query($sql3);
                                                            
                                                                while($row = $result3->fetch_assoc()) {  
                                                                $id_dis = $row['id_disquera']; 
                                                                $name_dis = $row['nombre'];

                                                            ?>
                                                        <option value="<?php echo $id_dis; ?>"><?php echo $name_dis;?></option>    
                                                    <?php } ?>
                                                 </select>    
                                            </div>
                                            <label class="control-label col-sm-2" for="item_photo">Portada:</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" id="item_photo" name="item_photo" accept="image/*"> 
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_description">Descripción:</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="item_description" name="item_description" placeholder="Description" required style="width: 100%;"><?php echo $item_d; ?>
                                                </textarea>
                                            </div>
                                            <label class="control-label col-sm-2" for="item_description"></label>
                                            <div lass="col-sm-4">
                                                <img id="imgSalida" name="imgSalida" class="img-thumbnail" width="55" height="55" src="" /> 
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <!--Añadir al Stock -->
                    <div id="add<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" class="form-horizontal" role="form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Añadir al Stock</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Album:</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" name="add_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Nombre" required readonly value="<?php echo $item_name; ?>"> 
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Artista:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" required readonly value="<?php echo $item_code; ?>" autocomplete="off"> 
                                            </div>
                                        </div>

                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_price">Precio:</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="item_price" name="item_price" placeholder="$00.00" required readonly value="<?php echo $item_description; ?>" autocomplete="off">
                                                </div>
                                            <label class="control-label col-sm-2" for="item_name">Cantidad:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" autocomplete="off" required min="1"> 
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="add_inventory"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--Sacar de Stock -->
                    <div id="out<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <form method="post" class="form-horizontal" role="form">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Sacar del Stock</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_name">Album:</label>
                                            <div class="col-sm-4">
                                                <input type="hidden" name="minus_stocks_id" value="<?php echo $id; ?>">
                                                <input type="text" class="form-control" id="item_name" name="item_name" readonly value="<?php echo $item_name; ?>"> 
                                            </div>
                                            <label class="control-label col-sm-2" for="item_code">Artista:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_code" name="item_code" readonly value="<?php echo $item_code; ?>"> 
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="item_price">Precio:</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="item_price" name="item_price" readonly value="<?php echo $item_description; ?>"> 
                                            </div>
    
                                            <label class="control-label col-sm-2" for="item_name">Cantidad:</label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" autocomplete="off" required max="<?php echo $qty; ?>" min="1"> </div>
                                            </div>
                                        </div>
                                    <br>    
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="minus_inventory"><span class="glyphicon glyphicon-minus"></span> Sacar</button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancerlar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--Borrar Item -->
                    <div id="delete<?php echo $id; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <form method="post">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Borrar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                                        <div class="alert alert-danger">¿Estas Seguro de Borrar <strong>
                                                <?php echo $item_name; ?>?</strong> </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Si</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> No</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
    <!--Añadir item Modal -->
    <div id="add" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <form method="post" class="form-horizontal" role="form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Añadir Producto</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><!--Album y Precio-->
                            <label class="control-label col-sm-2" for="item_name">Album:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Nombre" autocomplete="off" autofocus required> </div>
                            <label class="control-label col-sm-2" for="item_code">Precio:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_code" name="item_code" placeholder="$00.00" required > 
                            </div>
                        </div>
                        <div class="form-group">   <!--Artista y Fecha -->
                            <label class="control-label col-sm-2" for="item_art">Artista:</label>
                            <div class="col-sm-4">                                 
                                <select class="form-control" id="item_art" name="item_art">
                                    <option value="0">Seleccionar Artista</option>
                                    <?php 
                                        $result2 = $conn->query($sql2);
                                    
                                        while($row = $result2->fetch_assoc()) {  
                                        $id_ar = $row['id_artista']; 
                                        $name_ar = $row['nombre'];

                                    ?>
                                    <option value="<?php echo $id_ar; ?>"><?php echo $name_ar;?></option>    
                                <?php } ?>
                                </select>    
                            </div>
                            <label class="control-label col-sm-2" for="item_date">Fecha:</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control"  id="item_date" name="item_date">
                            </div>
                        </div>

                        <div class="form-group"><!--Genero y Stock-->
                            <label class="control-label col-sm-2" for="item_gen">Genero:</label>
                            <div class="col-sm-4">                                
                                <select class="form-control" id="item_gen" name="item_gen">
                                    <option value="0">Seleccionar Genero</option>
                                        <?php 
                                                
                                            $result1 = $conn->query($sql1);
                                        
                                            while($row = $result1->fetch_assoc()) {  
                                            $id_ge = $row['id_genero']; 
                                            $name_ge = $row['nombre'];

                                        ?>
                                    <option value="<?php echo $id_ge; ?>"><?php echo $name_ge;?></option>    
                                    <?php } ?>
                                </select>    
                            </div>
                            <label class="control-label col-sm-2" for="quantity">Stock:</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" autocomplete="off" min="0"> 
                            </div>
                        </div>
                        <div class="form-group"><!-- Disquera y Portada-->
                            <label class="control-label col-sm-2" for="item_dis">Disquera:</label>
                            <div class="col-sm-4">                                
                                <select class="form-control" id="item_dis" name="item_dis">
                                    <option value="0">Seleccionar Disquera</option>
                                    <?php 
                                               
                                        $result3 = $conn->query($sql3);
                                    
                                        while($row = $result3->fetch_assoc()) {  
                                        $id_dis = $row['id_disquera']; 
                                        $name_dis = $row['nombre'];

                                    ?>
                                    <option value="<?php echo $id_dis; ?>"><?php echo $name_dis;?></option>    
                                <?php } ?>
                                </select>    
                            </div>
                            <label class="control-label col-sm-2" for="item_sub_category">Portada:</label>
                            <div class="col-sm-4">
                                 <input type="file" class="form-control" id="item_photo" name="item_photo" accept="image/*"> 
                            </div>
                        </div>
      
                        <div class="form-group"><!--Descripción-->
                            <label class="control-label col-sm-2" for="item_sub_category">Descripción:</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" id="item_description" name="item_description" autocomplete="off" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"><!--Botones de las acciones-->
                        <button type="submit" class="btn btn-primary" name="add_item"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--Añadir Disquera--->
    <div id="disquera" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <form method="post" class="form-horizontal" role="form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Añadir Disquera</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_dis">Disquera:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_dis" name="item_dis" placeholder="Nombre" autocomplete="off" autofocus required> </div>
                            </div>
                        </div>
                        <br>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_dis"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancerlar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Añadir Artista--->
    <div id="artista" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <form method="post" class="form-horizontal" role="form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Añadir Artista</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_art">Artista:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_art" name="item_art" placeholder="Nombre" autocomplete="off" autofocus required> </div>
                            </div>
                        </div>
                        <br>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_art"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancerlar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Añadir Genero--->
    <div id="genero" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <form method="post" class="form-horizontal" role="form">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Añadir Genero</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="item_gen">Genero:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="item_gen" name="item_gen" placeholder="Nombre" autocomplete="off" autofocus required> </div>
                            </div>
                        </div>
                        <br>    
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="add_gen"><span class="glyphicon glyphicon-plus"></span> Añadir</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancerlar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Cerrar Sesion -->
    <div id="logout" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cerrar Sesión</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="delete_id" value="<?php echo $id; ?>">
                    <div class="alert alert-danger">Esta Seguro de Cerrar la Sesión
                        <strong>
                            <?php echo "User" ?>?
                        </strong>
                    </div>
                    <div class="modal-footer">
                        <a href="../../index.php">
                            <button type="button" class="btn btn-danger">Si</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>             
    </div>
    <br>
    <br>

    <script>
    $(window).load(function(){

        $(function() {
        $('#item_photo').change(function(e) {
            addImage(e); 
            });

            function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;
        
            if (!file.type.match(imageType))
            return;
        
            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
            }
        
            function fileOnload(e) {
            var result=e.target.result;
            $('#imgSalida').attr("src",result);
            }
        });
        });

    </script>
</body>
</html>