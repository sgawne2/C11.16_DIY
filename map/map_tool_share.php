
<!DOCTYPE html>
<html>
    <head>
        <title> tool share </title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">

        <!-- include the jQuery library as we are using jQuery functions -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="js_map_tool_share.js"></script>

        <!--Angular Material Style Sheets-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link type="text/css" rel="stylesheet" href="map_stylesheet.css">

    </head>

    <body>
        <?php $tool = $_GET["tool"]; ?>

        <form id="tool-form">
            Searching for:
            <input class="map_tool" type="text" name="tool_name" value="<?php print($tool); ?>">

<!--            <button type="button" id="submitButton">submit</button>-->
        </form>

        <p></p>
<!--        <div id="floating-panel">-->
<!--            <input id="address" type="textbox" value="Sydney, NSW">-->
<!--            <input id="submit" type="button" value="Geocode">-->
<!--        </div>-->
        <div id="map"></div>

        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus">
        </script>
    </body>
</html>

<!-- '&callback=initMap' --- append this to the end of the src="https://maps.googleapis.com..." to get an initial map -->