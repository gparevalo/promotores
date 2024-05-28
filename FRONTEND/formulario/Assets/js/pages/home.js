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
      $("#btnNext").attr("onclick", "btnAgregarProspect(this)");
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
 var serviceProspectValue = $("#serviceProspect").val();
  var camposValidar;
  if (serviceProspectValue == "no") {
  camposValidar = $("#frmProspect").find("input, select, textarea").not("#imgProspect, #imgProspectValue, #idApprover, #idInstaller, #idProspect, #otraCategoria, #nameProspect, #lastNameProspect, #rucCIProspect, #phoneProspect, #emailProspect");
console.log(camposValidar)
} else {
  camposValidar = $("#frmProspect").find("input, select, textarea").not("#imgProspect, #imgProspectValue, #idApprover, #idInstaller, #idProspect, #otraCategoria, #notaProspect, #nameProspect, #lastNameProspect, #rucCIProspect, #phoneProspect, #emailProspect");
console.log(camposValidar);
}

  var camposVacios = camposValidar.filter(function() {
    return $(this).val() === '';
  });

  if (camposVacios.length > 0) {
    alert("Por favor, complete todos los campos antes de pasar al siguiente paso");
    return;
  }
  $("#primera-parte").hide();
  $("#segunda-parte").show();
}

// AGREGAR PROSPECTO
function btnAgregarProspect(element) {

  var serviceProspectValue = $("#serviceProspect").val();
  var camposValidar;
  if (serviceProspectValue == "no") {
  camposValidar = $("#frmProspect").find("input, select, textarea").not("#imgProspect, #imgProspectValue, #idApprover, #idInstaller, #idProspect, #otraCategoria, #nameProspect, #lastNameProspect, #rucCIProspect, #phoneProspect, #emailProspect");
console.log(camposValidar)
} else {
  camposValidar = $("#frmProspect").find("input, select, textarea").not("#imgProspect, #imgProspectValue, #idApprover, #idInstaller, #idProspect, #otraCategoria, #notaProspect");
}

  var camposVacios = camposValidar.filter(function() {
    return $(this).val() === '';
  });

  if (camposVacios.length > 0) {
    alert("Por favor, complete todos los campos antes de enviar el formulario.");
    return;
  }
element.classList.add('disabled-link');
  var formData = new FormData($("#frmProspect")[0]);

  $.ajax({
    url: base_url + "/Inicio/agregarProspect",
    method: "POST",
    dataType: "json",
    processData: false,
    contentType: false,
    data: formData,
    success: function (response) {
element.classList.remove('disabled-link');
      if (response) {
        alert("INFORMACIÓN ENVIADA CON ÉXITO!. En las siguientes 24 horas un promotor se comunicará contigo.");
        window.location = base_url;
      } else {
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


map = L.map('map').setView([-1.831239, -78.183406], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

const submitButton = document.getElementById("search");
const clearButton = document.getElementById("delete");

submitButton.addEventListener("click", () => {
	clear();

    geocode(inputText.value)
  });

clearButton.addEventListener("click", () => {
    clear();
    getCurrentLocation();

 });


function initMap2() {
  //map = new google.maps.Map(document.getElementById("map"), {
  //  zoom: 7,
  //  center: {
  //    lat: -1.831239,
  //    lng: -78.183406,
  //  },
  //  mapTypeControl: false,
  //});


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
    geocode(inputText.value)
  );
  clearButton.addEventListener("click", () => {
    // clear();
    getCurrentLocation();

  });


  clear();
}

function clear() {
  // Eliminar todas las capas (layers) de marcadores del mapa
            map.eachLayer(layer => {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });
}


mapboxgl.accessToken ='pk.eyJ1IjoiamhvZXkwMHhkIiwiYSI6ImNsdmxrN3JwbzJmMGkyam4xbG1xNzU3cmEifQ.eEqf6UGHM0zww1n_MZe-rQ';

function geocode(address) {
  //clear();
  var geocodeUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + encodeURIComponent(address) + '.json?access_token=' + mapboxgl.accessToken;

fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    // Obtener las coordenadas (latitud y longitud) de la primera coincidencia
                    var coordinates = data.features[0].center;
                    var lat = coordinates[1];
                    var lng = coordinates[0];

            
 			L.marker([lat, lng]).addTo(map)
 


                    // Centrar el mapa en las coordenadas del marcador
                    // map.setView([lat, lng], 13);
			map.flyTo([lat, lng], 15);

                })
                .catch(error => {
                    console.error('Error al obtener las coordenadas:', error);
                });
}

function reverseGeocode(lat, lng) {
    var reverseGeocodeUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' + lng + ',' + lat + '.json?access_token=' + mapboxgl.accessToken;

    fetch(reverseGeocodeUrl)
        .then(response => response.json())
        .then(data => {
            if (data.features.length > 0) {
                var address = data.features[0].place_name;
                
		inputText.value = address;
            } else {
                alert('No se encontró ninguna dirección para las coordenadas proporcionadas.');
            }
        })
        .catch(error => {
            console.error('Error al obtener la dirección:', error);
        });
}

function getCurrentLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const currentPosition = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
	reverseGeocode(position.coords.latitude, position.coords.longitude);
	L.marker(currentPosition).addTo(map);
        map.flyTo(currentPosition,15);
	
       },
      () => {
        handleLocationError(true);
      }
    );
  } else {
    handleLocationError(false);
  }
}

function handleLocationError(browserHasGeolocation) {
  const error = browserHasGeolocation
    ? "Error: The Geolocation service failed."
    : "Error: Your browser doesn't support geolocation.";
  alert(error);
}
//window.initMap = initMap;
