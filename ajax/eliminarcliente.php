<?php 
		// Conexión a la base de datos
		include('../conexion.php');
		
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clienteid'])) {
  $clienteId = $_POST['clienteid'];

  $stmt = $conn->prepare('DELETE FROM clientes WHERE id = :id');
  $stmt->bindParam(':id', $clienteId);
  $stmt->execute();
}
 ?>