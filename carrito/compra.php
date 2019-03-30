<?php  
$conn = mysqli_connect("localhost","root","","dbcarrito");
if(isset($_POST['btnComprar'])) {
	
	$txt_cantidad = $_POST['txt_cantidad'];

	$query ="select * from detalleVenta where txt_cantidad='{$txt_cantidad}'
	";
	$result =mysqli_query($conn,$query);

	if($res=mysqli_fetch_array($result)){
  echo "<script>alert(\"Compra exitosa!\"); </script> ";
	} else {
       echo "<script>alert(\"Algo fallo en la compra\"); </script> ";
	}
}

?>