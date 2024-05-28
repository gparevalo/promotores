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
  
    
    toggleNotaProspect();

    // $("#imgIProspect").change(function (event) {
    //   const fileInput = event.target;
    //   const file = fileInput.files[0];
    //   var title = file.name.replace(/\s+/g, "_");
    //   var imageBD = $("#imgInstalledProspectValue");
  
    //   imageBD.val(title);

    // });

  });

  function cambiarValue(event)
   {
    console.log("cambio");

    const fileInput = event.target;
      const file = fileInput.files[0];
      var title = file.name.replace(/\s+/g, "_");
      var imageBD = $("#imgInstalledProspectValue");
  
      imageBD.val(title);
  }
  
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
      url: base_url + "/Instalador/agregarProspect",
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

  // AGREGAR COMENTARIO
function addComments() {
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

  function toggleNotaProspect() {
    var selectElement = document.getElementById("affiliationProspect");
    var notaProspectContainer = document.getElementById("notaProspectContainer");
    
    if (selectElement.value === "Rechazado") {
        notaProspectContainer.style.display = "block";
    } else {
        notaProspectContainer.style.display = "none";
    }
}


