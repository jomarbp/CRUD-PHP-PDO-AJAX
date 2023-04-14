<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <div class="jumbotron text-center">
    <h2> INTERFAZ PRINCIPAL </h2>
  </div>

  <div class="container">
    <p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Agregar Clientes</button>
    </p>
<table class="table">
    <thead>
      <tr>
        <th>Código</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Acciones</th>
      </tr>
    </thead>
<?php 
  include 'conexion.php';//include -> incluir (Script)
  //mostrar el ID, NOMBRES Y APELLIDOS de la tabla clientes
  $consultaSql = "SELECT id,nombre,apellido FROM clientes";
  $pconsulta = $conn->prepare($consultaSql);//preparando la ejecución de la consulta
  $pconsulta->execute();//ejecuto la consulta
  $resultados = $pconsulta->fetchAll(PDO::FETCH_OBJ);//almacenando las columnos o campos con sus registros en un arreglo.
  //foreach - ciclo 
  foreach ($resultados as $resultado) {
?>
    <tbody>
      <tr><!--FILAS -->
        <td><?php echo $resultado->id; ?></td><!-- COLUMNAS -->
        <td><?php echo utf8_encode($resultado->nombre); ?></td>
        <td><?php echo utf8_encode($resultado->apellido); ?></td>
        <td>
          <button type="button" class="btn btn-success">Editar</button>
          <button type="button" class="btn btn-danger">Eliminar</button>
        </td>
      </tr>
    </tbody>
<?php
  }
 ?>
</table>

  </div>

  
 </body>
</html>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Formulario Clientes</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label for="email">Id Clientes:</label>
            <input type="number" class="form-control" placeholder="Ingrese el id del cliente" id="idcliente">
          </div>

          <div class="form-group">
            <label for="email">Nombres completos:</label>
            <input type="text" class="form-control" placeholder="Ingrese sus nombres completos" id="nombres">
          </div>

          <div class="form-group">
            <label for="pwd">Apellidos completos:</label>
            <input type="text" class="form-control" placeholder="Ingrese sus apellidos completos" id="apellidos">
          </div>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>