$(document).ready(function() {
  $('#agregarClienteform').submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'ajax/agregarcliente.php',
      data: $(this).serialize(),
      success: function() {
        alert('Registro agregado exitosamente');
        $("#agregarClienteform")[0].reset();
		$("#agregarClienteModal").modal('hide');
		 location.reload();
      },
      error: function() {
        alert('Error al agregar el registro');
      }
    });
  });
});


$(document).ready(function() {
$('.editarCliente').click(function(event) {
var clienteId = $(this).data('clienteid');
$.ajax({
  type: 'POST',
  url: 'ajax/cargarcliente.php',
  data: { cliente_id: clienteId },
  success: function(data) {
  var cliente = JSON.parse(data);
  $('#cliente_id').val(cliente.id);
  $('#nombre').val(cliente.nombre);
  $('#apellido').val(cliente.apellido);
  },
  error: function() {
  alert('Error al cargar los datos del cliente');
  }
  });
  });
});


$(document).ready(function() {
  $('.eliminarCliente').click(function(event) {
  event.preventDefault();
  if (confirm("¿Está seguro de que desea eliminar este cliente?")) {
  $.ajax({
  type: 'POST',
  url: 'ajax/eliminarcliente.php',
  data: { clienteid: $(this).data('clienteid') },
  success: function() {
  alert('Registro eliminado exitosamente');
  location.reload();
},
  error: function() {
  alert('Error al eliminar el registro');
  }
  });
  }
  });
});