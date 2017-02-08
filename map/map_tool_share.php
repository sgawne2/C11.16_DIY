
<html lang="en">
    <head>
        <link type="text/css" rel="stylesheet" href="map_style.css" />
        <!--<script src="map.js"></script>-->

        <!--<script async defer-->
                <!--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus&callback=initMap">-->
        <!--</script>-->

        <!-- include the jQuery library as we are using jQuery functions -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#submitButton").click(function() {
                    console.log("inside click handler");
                    $.ajax({
                        data:       $("#find_tool_form").serialize(),  // Serialize grabs the text from a form element
                        dataType:   'text',
                        url:        'find_tool_owners.php',
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
        </script>

        <meta charset="UTF-8">
        <title>map toolShare</title>
    </head>

    <body>
        <form id="find_tool_form">
            Tool name:
            <input type="text" name="tool_name">
            <button type="button" id="submitButton">submit</button>
        </form>

        <h3>My Google Maps Demo</h3>
        <div id="map"></div>


    </body>
</html>