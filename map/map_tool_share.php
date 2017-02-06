<!DOCTYPE html>
<html lang="en">


<?php
    require('../db/mysql_connect.php');

    $query = "  SELECT tool_name, user_name, street_address, city, state, zip_code
                FROM `map_tu` as m  JOIN `users` as u ON m.user_id = u.user_id
                                    JOIN `tools` as t ON m.tool_id = t.tool_id
                WHERE t.tool_id=186 " ;

    $result = mysqli_query($conn, $query);

//    print_r($result);

    $output = [];

    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
            $output[] = $row;
        }
    }
?>

    <head>
        <link type="text/css" rel="stylesheet" href="map_style.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="map.js"></script>

<!--        <script async defer-->
<!--                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus&callback=initMap">-->
<!--        </script>-->

        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus">
        </script>

        <meta charset="UTF-8">
        <title>map toolShare</title>
    </head>

    <body>

        <form id="map-form">
            <br> Address:
            <input type="text" name="addy"><br>
            <button type="button" id="submitButton">submit</button>
        </form>

<!--        <h3>My Google Maps Demo</h3>-->
<!--        <div id="map">-->
<!--            <div>-->
<!--                <input id="address" type="textbox" value="Sydney, NSW">-->
<!--                <input type="button" value="Encode" onclick="codeAddress()">-->
<!--            </div>-->
<!--        </div>-->
    </body>
</html>