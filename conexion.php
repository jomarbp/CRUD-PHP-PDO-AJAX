<?php
$servername = "localhost";//nombre del servidor
$username = "root";//usuario: defecto [ root ]
$password = "";//vacio
try {
  $conn = new PDO("mysql:host=$servername;dbname=tienda", $username, $password);//conectando a la bd

  // capturando los errores o excepciones
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Conexión Exitosa";

} catch(PDOException $e) {
  //mostrar los errores encontrados
  echo "Conexión Fallida: " . $e->getMessage();
}
?>