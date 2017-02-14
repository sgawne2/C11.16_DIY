
/* this function isn't used, but is kept here just in case */
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

function geocodeAddress(geocoder, resultsMap, address, u_name, u_email, u_photo) {
//            var address = document.getElementById('address').value;

    var contentString = "<img class='info_window' src='" + u_photo + "'/>" + " " + u_name + "<br>" + u_email;

    // var contentString = '<div id="content">'+
    //     '<div id="siteNotice">'+
    //     '</div>'+
    //     '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
    //     '<div id="bodyContent">'+
    //     '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
    //     'sandstone rock formation in the southern part of the '+
    //     'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
    //     'south west of the nearest large town, Alice Springs; 450&#160;km '+
    //     '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
    //     'features of the Uluru - Kata Tjuta National Park. Uluru is '+
    //     'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
    //     'Aboriginal people of the area. It has many springs, waterholes, '+
    //     'rock caves and ancient paintings. Uluru is listed as a World '+
    //     'Heritage Site.</p>'+
    //     '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
    //     'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
    //     '(last visited June 22, 2009).</p>'+
    //     '</div>'+
    //     '</div>';

    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location,
                title: 'user'
            });

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click', function() {
                infowindow.open(map,marker)
            })
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
                        array.push(result[i].street_address);
                        array.push(result[i].city);
                        array.push(result[i].state);
                        array.push(result[i].zip_code);

                        u_name = result[i].user_name;
                        u_email = result[i].email;
                        u_photo = result[i].user_photo;

                        if (u_photo === "images/blank.jpg") {
                            u_photo = "../" + "images/blank.jpg"
                        }

                        address = array.join(" ");
                        address_array.push(address);
                        array = [];                     // reset array

                        geocodeAddress(geocoder, map, address, u_name, u_email, u_photo);

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

