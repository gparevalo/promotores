$(document).ready(function () {
  $("#category").change(function () {
    if ($(this).val() === "Otra") {
      $("#otraCategoria").show();
    } else {
      $("#otraCategoria").hide();
    }
  });

  $("#serviceProspect").change(function () {
    if ($(this).val() === "no") {
      $("#notaProspect").show();
      $("#btnNext").html("Guardar <span class='icon-save ico-djde837'></span>");
      $("#btnNext").attr("onclick", "btnAgregarProspect()");
      $("#btnNext").removeClass("bt-next1").addClass("bt-next2");
    } else {
      $("#notaProspect").hide();
      $("#btnNext").html(
        "Siguiente <span class='icon-arrow-right ico-djde837'></span>"
      );
      $("#btnNext").attr("onclick", "mostrarSegundaParte()");
      $("#btnNext").removeClass("bt-next2").addClass("bt-next1");
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

// MOSTRAR SEGUNDA PARTE
function mostrarSegundaParte() {
  $("#primera-parte").hide();
  $("#segunda-parte").show();
}

// AGREGAR PROSPECTO
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
        alert("Comercio enviado con exito.");
        // window.location = base_url + "/Prospectos";
      }else{
        alert("Error al enviar comercio.");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error:", textStatus, errorThrown);
    },
  });
}

// MAPA

let map;
let marker;
let geocoder;
let responseDiv;
let response;
const inputText = document.getElementById("directionProspect");

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: {
      lat: -34.397,
      lng: 150.644,
    },
    mapTypeControl: false,
  });
  geocoder = new google.maps.Geocoder();

  // let inputText = document.getElementById("directionProspect");
  const submitButton = document.getElementById("search");
  const clearButton = document.getElementById("delete");

  response = document.createElement("pre");
  response.id = "response";
  response.innerText = "";
  responseDiv = document.createElement("div");
  responseDiv.id = "response-container";
  responseDiv.appendChild(response);

  marker = new google.maps.Marker({
    map,
  });
  map.addListener("click", (e) => {
    geocode({
      location: e.latLng,
    });
  });
  submitButton.addEventListener("click", () =>
    geocode({
      address: inputText.value,
    })
  );
  clearButton.addEventListener("click", () => {
    clear();
  });
  clear();
}

function clear() {
  marker.setMap(null);
  responseDiv.style.display = "none";
}

function geocode(request) {
  clear();
  geocoder
    .geocode(request)
    .then((result) => {
      const { results } = result;

      map.setCenter(results[0].geometry.location);
      map.setZoom(18);
      marker.setPosition(results[0].geometry.location);
      marker.setMap(map);
      responseDiv.style.display = "block";
      response.innerText = JSON.stringify(result, null, 2);
      console.log(results[0]);
      inputText.value = results[0].formatted_address;
      return results;
    })
    .catch((e) => {
      alert("Geocode was not successful for the following reason: " + e);
    });
}


window.initMap = initMap;
