
<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding service</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">

        <!-- include the jQuery library as we are using jQuery functions -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="js_map_tool_share.js"></script>

        <link type="text/css" rel="stylesheet" href="map_stylesheet.css"/>
    </head>

    <body>
        <form id="tool-form">
            <br> What tool do you want to search for?
            <input type="text" name="tool_name">

            <button type="button" id="submitButton">submit</button>
        </form>

<!--        <div id="floating-panel">-->
<!--            <input id="address" type="textbox" value="Sydney, NSW">-->
<!--            <input id="submit" type="button" value="Geocode">-->
<!--        </div>-->
        <div id="map"></div>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus&callback=initMap">
        </script>
    </body>
</html>