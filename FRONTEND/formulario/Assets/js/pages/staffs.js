
// AGREGAR PERSONAL
function btnAgregarStaff()
{
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