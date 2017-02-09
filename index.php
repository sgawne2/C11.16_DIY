<?php
session_start();
$slogans = [
    "Let's make some stuff!",
    "Turn your trash into treasure!",
    "Turn your junk into jewels!",
    "Turn your litter into glitter!",
    "Turn your garbage into gold!",
    "Turn your crap into carpentry!",
    "Don't make waste, make wow!",
    "It's not debris, it's de bomb!"
];

$backgrounds = [
    "art_supplies.jpg",
    "technology1.jpg",
    "tool-box.jpg"
]
?>
<html lang="en" >
<head>
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

    <!-- include the jQuery library as we are using jQuery functions -VL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Angular Material requires Angular.js Libraries -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-route.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

    <!-- Angular Material Library -->
    <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>

    <!-- Google Sign In -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!--Local Script Sources-->
    <script src="js/diyApp/diyApp.js"></script>
    <script src="js/components/app/app.component.js"></script>
    <script src="js/components/addStep/addStep.component.js"></script>
    <script src="js/components/autoChip/autoChip.component.js"></script>
    <script src="js/components/projectCard/projectCard.component.js"></script>
    <script src="js/components/footer/footer.component.js"></script>
    <script src="js/components/sidePanel/sidePanel.component.js"></script>
    <script src="js/components/featuredProjects/featuredProjects.component.js"></script>
</head>

<body ng-app="diyApp">

<!-- Facebook share and like button templates -VL -->
    <!-- FB "Share w/# of likes" button -VL -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

<!--sticky header-->
<?php include('header.php'); ?>


<div class="headerImage" hide-xs hide-gt-xs hide-sm hide-gt-sm show-md show-gt-md show-lg show-gt-lg show-xl style="background-image: url(images/<?= $backgrounds[rand(0, count($backgrounds) - 1) ]; ?>)">
    <h2 class="headerImageText"><span class="orangeText">Mac</span><span class="darkTealText">diy</span><span class="orangeText">ver</span></h2>
    <h1><?= $slogans[rand(0, count($slogans) - 1) ]; ?></h1>
</div>

<!--<div class="headerImage" hide-xs hide-gt-xs hide-sm hide-gt-sm show-md show-gt-md show-lg show-gt-lg show-xl>-->
<!--    <img class="image2" src="images/technology1.jpg">-->
<!--<!--    <img class="image1" src="images/tool-box.jpg">-->
<!--<!--    <img class="image3" src="images/art_supplies.jpg">-->
<!--</div>-->
<!---->
<!--<div class="homepageTextContainer" layout-align="center">-->
<!--    <h2 class="headerImageText"><span class="orangeText">Mac</span><span class="darkTealText">diy</span><span class="orangeText">ver</span></h2>-->
<!--    <h1>Let's make some stuff!</h1>-->
<!--</div>-->

<!--&lt;!&ndash;search bar&ndash;&gt;-->
<!--<auto-chip></auto-chip>-->

<!--&lt;!&ndash;main content&ndash;&gt;-->
<!--<div class="main" layout="row" flex="80" style="margin:0 auto;">-->
    <!--<project-card></project-card>-->
<!--</div>-->

<app></app>
<footer></footer>

<!--side nav-->
<side-panel></side-panel>

</body>
</html>