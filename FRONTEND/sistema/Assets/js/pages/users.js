$(document).ready(function () {
   
  });
  
  
  // AGREGAR PERSONAL
  function btnAgregarUser()
  {
var nombres = document.getElementById('namesStaff').value;
    var celular = document.getElementById('phoneStaff').value;
    var correo = document.getElementById('emailStaff').value;
    var clave = document.getElementById('claveStaff').value;

    
    // Validar que los campos obligatorios no estén vacíos
    if (nombres.trim() === '' || celular.trim() === '' || correo.trim() === '' || clave.trim() === '') {
        // Mostrar un mensaje de error o alguna indicación al usuario
        alert('Por favor, complete todos los campos obligatorios.');
        return; // Detener la ejecución si los campos no están completos
    }
      var formData = new FormData($("#frmUser")[0]);
  
      $.ajax({
          url: base_url + "/Usuarios/agregarUser",
          method: "POST",
          dataType: "json",
          processData: false,
          contentType: false,
          data: formData,
          success: function (response) 
          {
            if (response) 
            {
              window.location = base_url + "/Usuarios";
            }
          },
          error: function (jqXHR, textStatus, errorThrown) 
          {
            console.error("Error:", textStatus, errorThrown);
  
          },
        });
  }
  
  
  // EDITAR STAFF
  function editUser(id)
  {
    var formData = new FormData($("#frmStaff"+id)[0]);
  
      $.ajax({
          url: base_url + "/Usuarios/editarUser/" + id,
          method: "POST",
          dataType: "json",
          processData: false,
          contentType: false,
          data: formData,
          success: function (response) 
          {
            if (response) 
            {
              window.location = base_url + "/Usuarios";
            }
          },
          error: function (jqXHR, textStatus, errorThrown) 
          {
            console.error("Error:", textStatus, errorThrown);
  
          },
        });
  }
  
  // ELIMINAR PERSONAL
  function deleteUser(id) {
    $.ajax({
      url: base_url + "/Usuarios/eliminar/" + id,
      method: "GET",
      dataType: "json",
      success: function (response) {
        if (response) {
          window.location = base_url + "/Usuarios";
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }