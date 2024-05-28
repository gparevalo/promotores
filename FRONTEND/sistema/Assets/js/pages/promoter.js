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
  

    $("#imgVisitedProspect").change(function (event) {
      const fileInput = event.target;
      const file = fileInput.files[0];
  
      var title = file.name.replace(/\s+/g, "_");
      var imageBD = $("#imgVisitedProspectValue");
  
      imageBD.val(title);
    });

    $("#imgOpeningProspect").change(function (event) {
      const fileInput = event.target;
      const file = fileInput.files[0];
  
      var title = file.name.replace(/\s+/g, "_");
      var imageBD = $("#imgOpeningProspectValue");
  
      imageBD.val(title);
    });

    $("#imgTrainingProspect").change(function (event) {
      const fileInput = event.target;
      const file = fileInput.files[0];
  
      var title = file.name.replace(/\s+/g, "_");
      var imageBD = $("#imgTrainingProspectValue");
  
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
  function btnAgregarProspect(element) {
    element.classList.add('disabled-link');
    var formData = new FormData($("#frmProspect")[0]);
  
    $.ajax({
      url: base_url + "/Promotor/agregarProspect",
      method: "POST",
      dataType: "json",
      processData: false,
      contentType: false,
      data: formData,
      success: function (response) {
	element.classList.remove('disabled-link');
        var currentUrl = window.location.href;
        var cleanUrl = currentUrl.replace('#proceso', '');
        if (response) {
          window.location = cleanUrl;
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }

  function btnAgregarProspectAll()
  {
    var formData = new FormData($("#frmProspectAll")[0]);
  
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
            window.location = base_url + "/Promotor";
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.error("Error:", textStatus, errorThrown);
        },
      });
    }

    // AGREGAR COMENTARIO 
    function addComments(){
      var formData = new FormData($("#frmComment")[0]);
      $.ajax({
        url: base_url + "/Promotor/addComments",
        method: "POST",
        dataType: "json",
        processData: false,
        contentType: false,
        data: formData,
        success: function (response) {
          console.log(response);
          var currentUrl = window.location.href;
    
          if (response) {
            window.location = currentUrl;
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
      url: base_url + "/Prospectos/eliminar/" + idProspect,
      method: "GET",
      dataType: "json",
      success: function (response) {
        if (response) {
          window.location = base_url + "/Prospectos";
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.error("Error:", textStatus, errorThrown);
      },
    });
  }
  

  
