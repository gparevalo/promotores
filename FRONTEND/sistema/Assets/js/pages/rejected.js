$(document).ready(function () {
    $("#category").change(function () {
      handleCategoryChange();
    });
  
    handleCategoryChange();
  
    $("#serviceProspect").change(function () {
      if ($(this).val() === "no") {
        $("#notaProspect").show();
      } else {
        $("#notaProspect").hide();
      }
    });
  
    $("#imgProspect").change(function (event) {
      const fileInput = event.target;
      const file = fileInput.files[0];
  
      var title = file.name.replace(/\s+/g, "_");
      var imageBD = $("#imgProspectValue");
  
      imageBD.val(title);
    });
  
    
  });
  
  // MOSTRAR INPUT CATEGORIA
  function handleCategoryChange() {
    if ($("#category").val() === "Otra") {
      $("#otraCategoria").show();
    } else {
      $("#otraCategoria").hide();
    }
  }
  
  // AGREGAR-EDITAR PROSPECTO
  function btnAgregarProspect() {
    var formData = new FormData($("#frmProspect")[0]);
  
    $.ajax({
      url: base_url + "/Inicio/agregarProspect",
      method: "POST",
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (response) {
        var currentUrl = window.location.href;
        var cleanUrl = currentUrl.replace('#editar-prosct', '');
        if (response) {
          window.location = cleanUrl;
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
  
  // ENVIAR PROSPECTO A RECHAZADO
  function sendRejectedProspect() {
    var formData = new FormData($("#frmRejectedProspect")[0]);
    $.ajax({
      url: base_url + "/Inicio/sendRejected",
      method: "POST",
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (response) {
        console.log(response);
        var currentUrl = window.location.href;
        var cleanUrl = currentUrl.replace('#rechazar', '');
  
        if (response) {
          window.location = base_url + "/Rechazados";
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
  
  // ELIMINAR PROSPECTO
  function deleteProspect(idProspect) {
    $.ajax({
      url: base_url + "/Rechazados/eliminar/" + idProspect,
      method: "GET",
      dataType: "json",
      success: function (response) {
        if (response) {
          window.location = base_url + "/Rechazados";
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
  