<?php 
		// Conexión a la base de datos
		include('../conexion.php');
		$idcliente = $_POST['idcliente'];
		$nomcliente = $_POST['nombres'];
		$apecliente = $_POST['apellidos'];
		$consulta = "INSERT INTO clientes (id, nombre, apellido) VALUES (?, ?, ?)";
		$pconsulta = $conn->prepare($consulta);
		$pconsulta->execute([$idcliente, $nomcliente, $apecliente]);
 ?>