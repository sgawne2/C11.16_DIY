<?php
session_start();
?>
<html lang="en" >
<head>
    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Google Analytics tracking code -VL -->
    <?php include_once("google_analytics.php") ?>

    <!-- Pinterest -->
    <script
        type="text/javascript"
        async defer
        src="//assets.pinterest.com/js/pinit.js"
    ></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!--Local Script Sources-->
    <script src="js/diyApp/diyApp.js"></script>
    <script src="js/components/addStep/addStep.component.js"></script>
    <script src="js/components/toolSelector/toolSelector.component.js"></script>
    <script src="js/components/viewProject/viewProject.component.js"></script>
    <script src="js/components/addComment/addComment.component.js"></script>
    <script src="js/components/sidePanel/sidePanel.component.js"></script>
    <script src="js/components/footer/footer.component.js"></script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrs1E9ETofrHeLWg27W6_eHO9Ky6fmuus&callback=initMap">
    </script>

    <script>
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
    </script>

    <script>


//        $(document).ready(function() {
//            $("#submitButton").click(function() {
//                console.log("inside click handler");
//                $.ajax({
//                    data:       $("#tool-form").serialize(),  // Serialize grabs the text from a form element
//                    dataType:   'json',
//                    url:        './map/find_tool_owners.php',
//                    method:     'post',
//                    success: function(result) {
//                        var address;
//                        var array = [], address_array = [];
//
//                        var map = new google.maps.Map(document.getElementById('map'), {
//                            zoom: 8,
//                            center: {lat: 33, lng: -117}
//                        });
//                        var geocoder = new google.maps.Geocoder();
//
//                        console.log("success!");
//                        console.log("result: ", result);    // result returns anything in html, anything that gets printed
//                        // console.log("result length: ", result.length);
//
//                        for (var i=0; i < result.length; ++i) {
//                            for (x in result[i]) {
//                                // console.log(result[i][x]);
//                                array.push(result[i][x]);
//                            }
//
//                            address = array.join(" ");
//                            address_array.push(address);
//                            array = [];    // reset array
//
//                            geocodeAddress(geocoder, map, address);
//
//                            console.log("address " + i + ": ", address_array[i]);
//                        }
//
//                        // var geocoder = new google.maps.Geocoder();
//                        // geocodeAddress(geocoder, map, address);
//                    },
//                    error: function() {
//                        console.log("failure");
//                        console.log(result);
//                    }
//                })
//            });
//        });
    </script>

</head>
<body ng-app="diyApp">

<!--sticky header-->
<md-toolbar layout="column" ng-controller="AppCtrl">
    <div class="md-toolbar-tools">

        <!--hamburger icon-->
        <md-button ng-click="toggleLeft()"><md-icon md-font-set="material-icons">dehaze</md-icon></md-button>

        <div class="logo"></div>
        <h2><a href="index.php">Mac<span class="tealText">diy</span>ver</a></h2>
        <span flex=""></span>


        <md-button><a href="submit_project.php">Submit Project</a></md-button>
        <md-button>My Profile</md-button>
        <md-button>Login</md-button>
    </div>
</md-toolbar>

<!--Angular View Project Component-->
<view-project user-id="<?= $_SESSION['user_id'] ?>" user-name="<?= $_SESSION['user_name'] ?>"></view-project>

<!--side nav-->
<side-panel></side-panel>
<footer></footer>
</body>
</html>