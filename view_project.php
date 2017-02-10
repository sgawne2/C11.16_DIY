<?php
session_start();
?>
<html lang="en" >
<head>
    <title>Macdiyver</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="91270851940-5lgc81fgbnda478gb40n80nqi207rnpe.apps.googleusercontent.com">

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

    <!-- include the jQuery library as we are using jQuery functions (AJAX) -VL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!-- Google Sign In -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--Local Script Sources-->
    <script src="js/diyApp/diyApp.js"></script>
    <script src="js/components/addStep/addStep.component.js"></script>
    <script src="js/components/toolSelector/toolSelector.component.js"></script>
    <script src="js/components/viewProject/viewProject.component.js"></script>
    <script src="js/components/addComment/addComment.component.js"></script>
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

</head>
<body ng-app="diyApp">

<!--sticky header-->
<?php include('header.php'); ?>

<!--Angular View Project Component-->
<view-project user-id="<?= $_SESSION ? $_SESSION['user_id'] : 0; ?>" user-name="<?= $_SESSION ? $_SESSION['user_name'] : "Anonymous" ?>"></view-project>

<footer></footer>
</body>
</html>