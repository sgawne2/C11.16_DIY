<?php
session_start();
?>
<html lang="en" >
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="91270851940-5lgc81fgbnda478gb40n80nqi207rnpe.apps.googleusercontent.com">

    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Google Analytics tracking code -->
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
    <script src="js/components/createProfile/createProfile.component.js"></script>
    <script src="js/components/footer/footer.component.js"></script>

</head>
<body ng-app="diyApp">

<!--sticky header-->
<?php include('header.php'); ?>

<div layout="column" style="height:5%;"></div>

<md-card flex="70" flex-offset="15" style="max-height:none">
    <div style="background-color: #00BFA5; color:white; width:100%">
        <h2>Frequently Asked Questions</h2>
    </div>

    <md-card-content>

            <ol class="faqs">
                <li> 1. What is the purpose of this site? </li>
                <li class="answer"><b>To allow people to search and submit DIY projects based on the materials or tools they have.</b></li><br>
                <li> 2. Can I submit a project without an account? </li>
                <li class="answer"><b>No. However, signing up is free and easy. Then you can share your project ideas with the community!</b></li><br>
                <li> 3. If I submit a project, does it get displayed right away? </li>
                <li class="answer"><b>Yes.</b></li><br>
                <li> 4. Can I search for projects normally, that is without having to type in a bunch of tools? </li>
                <li class="answer"><b>Not at this time, but that feature will be added in release 1.2.</b></li><br>
                <li> 5. How much does it cost to feature a project of mine? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 6. What's the blog for? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 7. What if I dont have all the tools for the completing the project? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 8. What if I want to revisit a project I started but did have not completed yet? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 9. What should I do if a certain project requires or recommends certain skills I do not have? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 10. Can I sort projects according to difficulty? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 11. What should I do if I find a project that might be dangerous or illegal? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 12. What if one or more of the tools/materials is hazardous (i.e. propane tanks or aerosol cans)? </li>
                <li class="answer"><b>$20.</b></li><br>
                <li> 13. What happens if the project I submit get flagged? </li>
                <li class="answer"><b>$20.</b></li><br>

            </ol>

    </md-card-content>
</md-card>

<div layout="column" style="height:5%;"></div>
<footer></footer>
</body>
</html>