$(document).ready(function () {
  
});


// AGREGAR PERSONAL
function btnAgregarStaff()
{
var nombres = document.getElementById('namesStaff').value;
    var celular = document.getElementById('phoneStaff').value;
    var correo = document.getElementById('emailStaff').value;
    var clave = document.getElementById('claveStaff').value;
    var rol = document.getElementById('rolStaff').value;
    
    // Validar que los campos obligatorios no estén vacíos
    if (nombres.trim() === '' || celular.trim() === '' || correo.trim() === '' || clave.trim() === '' || rol.trim() === '') {
        // Mostrar un mensaje de error o alguna indicación al usuario
        alert('Por favor, complete todos los campos obligatorios.');
        return; // Detener la ejecución si los campos no están completos
    }

    var formData = new FormData($("#frmStaff")[0]);

    $.ajax({
        url: base_url + "/Personal/agregarStaff",
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) 
        {
          if (response) 
          {
            window.location = base_url + "/Personal";
          }
        },
        error: function (jqXHR, textStatus, errorThrown) 
        {
          console.error("Error:", textStatus, errorThrown);

        },
      });
}


// EDITAR STAFF
function editStaff(id)
{
  var formData = new FormData($("#frmStaff"+id)[0]);

    $.ajax({
        url: base_url + "/Personal/editarStaff/" + id,
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) 
        {
          if (response) 
          {
            window.location = base_url + "/Personal";
          }
        },
        error: function (jqXHR, textStatus, errorThrown) 
        {
          console.error("Error:", textStatus, errorThrown);

        },
      });
}

// ELIMINAR PERSONAL
function deleteStaff(idStaff) {
  $.ajax({
    url: base_url + "/Personal/eliminar/" + idStaff,
    method: "GET",
    dataType: "json",
    success: function (response) {
      if (response) {
        window.location = base_url + "/Personal";
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error:", textStatus, errorThrown);
    },
  });
}