<?php
$manejador="mysql";
$servidor="localhost";
$usuario="id6558475_tadeo";
$pass="tadeo1234";
$base="id6558475_carrito";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);
?>