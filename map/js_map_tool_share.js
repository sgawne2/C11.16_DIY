
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: 33, lng: -117}
    });
    var geocoder = new google.maps.Geocoder();
    var address_array = ["11 Windridge, Aliso Viejo, CA", "9080 Irvine Center Drive, Irvine, CA", "Disneyland", "Knotts Berry Farm"];

    for (var i=0; i < address_array.length; ++i) {
        geocodeAddress(geocoder, map, address_array[i]);
    }
}

function geocodeAddress(geocoder, resultsMap, address) {
//            var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

$(document).ready(function() {
    // $("#submitButton").click(function() {
        console.log("inside click handler");
        $.ajax({
            data:       $("#tool-form").serialize(),  // Serialize grabs the text from a form element
            method:     'post',
            url:        'find_tool_owners.php',
            dataType:   'json',
            success: function(result) {
                var address;
                var array = [], address_array = [];

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: {lat: 33, lng: -117}
                });
                var geocoder = new google.maps.Geocoder();

                console.log("success!");
                console.log("result: ", result);    // result returns anything in html, anything that gets printed
                // console.log("result length: ", result.length);

                if (result.length) {
                    for (var i=0; i < result.length; ++i) {
                        for (x in result[i]) {
                            // console.log(result[i][x]);
                            array.push(result[i][x]);
                        }

                        address = array.join(" ");
                        address_array.push(address);
                        array = [];    // reset array

                        geocodeAddress(geocoder, map, address);

                        console.log("address " + i + ": ", address_array[i]);
                    }
                } else {
                    $("p").prepend("<b>No results.</b>");
                    console.log("No neighbors have the tool or material you are looking for.");
                }

            },
            error: function(result) {
                console.log("failure");
                console.log(result);
            }
        })

});

