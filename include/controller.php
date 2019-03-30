<?php
session_start();

require 'conexion.php';

function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
//Login Query
if(isset($_POST['btn-login'])){
    $username=$_POST['username'];
    $txtpassword=$_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row['password'] == $txtpassword){
                $_SESSION['username'] = $row['username'];
                $_SESSION['tipo'] = $row['tipo'];
                header("location:inventory.php");
            } else {
                $username = $row['username'];
            }
        }
    } else {
        $username = "";
    }
}

//Añadir disquera
if(isset($_POST['add_dis'])){
    $item_dis = clean($_POST['item_dis']);
    $sql = "INSERT INTO disquera VALUES(null ,'$item_dis');";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="inventory.php"</script>';
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
}

//Añadir artista
if(isset($_POST['add_art'])){
    $item_art = clean($_POST['item_art']);
    $sql = "INSERT INTO artista VALUES(null ,'$item_art');";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="inventory.php"</script>';
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
}

//Añadir genero
if(isset($_POST['add_gen'])){
    $item_gen = clean($_POST['item_gen']);
    $sql = "INSERT INTO genero VALUES(null ,'$item_gen');";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="inventory.php"</script>';
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
}


//Actualizar Items
if(isset($_POST['update_item'])){
    $edit_item_id = $_POST['edit_item_id'];
    
    $item_name = $_POST['item_name'];//nombre
    $item_code = $_POST['item_code'];//precio
    
    $item_art = $_POST['item_art'];//artista
    $item_date = $_POST['item_date'];//fecha

    $item_gen = $_POST['item_gen'];//genero
    $quantity = $_POST['quantity'];//stock

    $item_dis = $_POST['item_dis'];//disquera
    $item_photo = $_POST['item_photo'];//portada
    $item_description = $_POST['item_description'];//descripcion
    
    $sql = "UPDATE album SET 
                id_genero = $item_gen,
                id_artista = $item_art,
                id_disquera = $item_dis,
                nombre = '$item_name',
                descripcion = '$item_description',
                precio = $item_code,
                fotografia = '$item_photo',
                fecha_publicacion ='$item_date',
                stock = $quantity WHERE id_album = '$edit_item_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.href="inventory.php"</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

//Borrar items
if(isset($_POST['delete'])){
    $delete_id = $_POST['delete_id'];
    $sql = "DELETE FROM album WHERE id_album ='$delete_id' ";
    if ($conn->query($sql) === TRUE) {
            $sql = "DELETE FROM album WHERE id_album='$delete_id' ";
            if ($conn->query($sql) === TRUE) {
                $sql = "DELETE FROM album WHERE id_album='$delete_id' ";
                echo '<script>window.location.href="inventory.php"</script>';
            } else {
                echo "Error al Borrar Registro" . $conn->error;
            }
            } else {
                echo "Error al Borrar Registro" . $conn->error;
            }
}
                    
//Añadir Items        
if(isset($_POST['add_item'])){
    
    $item_name = $_POST['item_name'];//album
    $item_code = $_POST['item_code'];//precio
    $item_art =  $_POST['item_art'];//artista                            
    $item_date =  $_POST['item_date'];//Fecha
    $item_gen =  $_POST['item_gen'];//genero                           
    $quantity =  $_POST['quantity'];//stock
    $item_dis =  $_POST['item_dis'];//disquera
    $item_photo = $_POST['item_photo'];//portada
    $item_description = $_POST['item_description'];//descripcion

    $sql = "INSERT INTO album (id_genero, id_artista, id_disquera, nombre, descripcion, precio, fotografia, fecha_publicacion, stock)VALUES ($item_gen, $item_art, $item_dis, '$item_name','$item_description','$item_code', '$item_photo', '$item_date', '$quantity')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>window.location.href="inventory.php"</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $foto = $_FILES['item_photo'];
        $data = array('success' => false);
        
        if(copy($foto['tmp_name'],'image/'.$foto['name'])){
        $data = array('success' => true);
        }
        
        echo json_encode($data);

    }
 
    //Añadir al Stock        
    if(isset($_POST['add_inventory'])){
        $add_stocks_id = clean($_POST['add_stocks_id']);
        $quantity = clean($_POST['quantity']);
        $sql = "UPDATE album SET stock =(stock + $quantity) WHERE id_album = '$add_stocks_id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="inventory.php"</script>';
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

    //Sacar del Stock
    if(isset($_POST['minus_inventory'])){
        $minus_stocks_id = clean($_POST['minus_stocks_id']);
        $quantity = clean($_POST['quantity']);
        $sql = "UPDATE album SET stock =(stock - $quantity) WHERE id_album = '$minus_stocks_id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>window.location.href="inventory.php"</script>';
            }else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
                  
        
    //Mostrar Los generos
    $sql1 = "SELECT id_genero, nombre FROM genero ORDER BY nombre ASC;";
                                   

    //Mostrar Los Artistas
    $sql2 = "SELECT * FROM artista ORDER BY nombre ASC;";
 
    //Mostrar Las Disquera
    $sql3 = "SELECT id_disquera, nombre FROM disquera ORDER BY nombre ASC;";
        
?>
 
                                 