function login() {
  var formData = new FormData($("#frmLogin")[0]);

  $.ajax({
    url: base_url + "/Login/validar",
    method: "POST",
    dataType: "json",
    processData: false,
    contentType: false,
    data: formData,
    success: function (response) {
      console.log(response);
      if (response.rolStaff == "Supervisor") {
        window.location = base_url + "/Prospectos";
      } else if (response.rolStaff == "Administrador") {
        window.location = base_url + "/Prospectos";
      } else if (response.rolStaff == "Promotor") {
        window.location = base_url + "/Promotor";
      } else if (response.rolStaff == "Aprobador") {
        window.location = base_url + "/Aprobador";
      } else if (response.rolStaff == "Instalador") {
        window.location = base_url + "/Instalador";
      } else {
        alert("Usuario o contraseña incorrecta");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error:", textStatus, errorThrown);
    },
  });
}
