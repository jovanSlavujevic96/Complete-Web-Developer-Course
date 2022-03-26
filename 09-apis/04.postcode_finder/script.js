var postal_code = "";

function GetPostalCode(city_name) {
    $.ajax({
        url: "get_postal_code.php?city="+city_name,
        type: "GET",
        error: function() {
            alert("Error on getting city postal code");
        },
        success: function(data) {
            alert(data);
        },
    });
}

$('#myOutput').hide();

$('#mySubmit').click(function(){
    $('#myOutput').show();
    $('#myOutput').addClass("alert");
    var entered_city = $('#myCityInput').val();
    if (entered_city == "") {
        $('#myOutput').addClass("alert-danger");
        $('#myOutput').removeClass("alert-success");
        $('#myOutput').html("FAILURE");
    }
    else {
        $('#myOutput').removeClass("alert-danger");
        $('#myOutput').addClass("alert-success");
        $('#myOutput').html("SUCCESS");

        GetPostalCode(entered_city);
    }
});

$(document).ready(function() {
    //clear on focus
    $('#myCityInput').focus(function() {
        $('#myCityInput').val("");
    });
});
