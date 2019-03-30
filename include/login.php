<?php
require('conexion.php');
sleep(1);
$usu=$_POST['username'];
$pass=$_POST['password'];
$usuarios=$conn->query("Select nombres,tipo
                        From usuarios Where usuario='".$usu."'
                      AND password='".$pass."'");
if ($usuarios->num_rows==1):
  $datos= $usuarios->fetch_assoc();
    echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
else:
    echo json_encode(array('error'=>true));
endif;
$conn->close();
?>
