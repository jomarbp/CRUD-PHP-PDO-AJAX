<?php

// Conexión a la base de datos utilizando PDO
include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cliente_id'])) {
  $clienteId = $_POST['cliente_id'];

  $stmt = $conn->prepare('SELECT * FROM clientes WHERE id = :id');
  $stmt->bindParam(':id', $clienteId);
  $stmt->execute();

  $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

  echo json_encode($cliente);
}

?>