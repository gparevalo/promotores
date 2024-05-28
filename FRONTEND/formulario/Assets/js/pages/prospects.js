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

// AGREGAR-EDITAR PERSONAL
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
      if (response) {
        window.location = base_url + "/Prospectos";
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error:", textStatus, errorThrown);
    },
  });
}
