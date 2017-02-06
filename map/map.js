
function initMap() {
    var uluru = {lat: -25.363, lng: 131.044};
    var sydney = {lat: -33.869, lng: 151.209};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom:   4,
        center: uluru
    });

    var latLong_array =
        [
            [-28, 140],
            [-29, 150],
            [-30, 160],
            [-27, 139],
            [-26, 138],
            [-25, 161]
        ];

    for (var i=0; i < latLong_array.length; i++) {
        var marker = new google.maps.Marker({
            position:   {lat: latLong_array[i][0], lng: latLong_array[i][1]},
            map:        map
        });
    }

    var marker1 = new google.maps.Marker({
        position: sydney,
        map: map
    });

    var marker2 = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

$(document).ready(function() {
    $(document).ready(function() {
        $("#submitButton").click(function() {
            console.log("inside click handler");
            $.ajax({
                data:       $("#map-form").serialize(),  // Serialize grabs the text from a form element
                dataType:   'text',
                url:        'map_insert.php',
                method:     'post',
                success: function(result) {
                    console.log("success!");
                    console.log(result);    // result returns anything in html, anything that gets printed
                },
                error: function() {
                    console.log("failure");
                    console.log(result);
                }
            })
        });
    });
});

var socal_psn = {lat: 33, lng: -117};

var geocoder;
var map;

function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(33, -117);
    var mapOptions = {
        zoom: 8,
        center: latlng
    };
    map = new google.maps.Map(document.getElementByID('map'), mapOptions);
}


function codeAddress () {
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}


