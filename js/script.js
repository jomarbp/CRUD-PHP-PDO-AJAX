$(document).ready(function() {
  $('#agregarClienteform').submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'ajax/agregarcliente.php',
      data: $(this).serialize(),
      success: function() {
        alert('Registro agregado exitosamente');
      },
      error: function() {
        alert('Error al agregar el registro');
      }
    });
  });
});