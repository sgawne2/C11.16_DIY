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

    <!-- include the jQuery library as we are using jQuery functions (AJAX) -VL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

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

    <script>
        $(document).ready(function() {
            $(".md-raised").click(function() {
                console.log("inside click handler");

                $.ajax({
                    data:       $("#comment_project").serialize(),  // Serialize grabs the text from a form element -VL
                    dataType:   'text',
                    url:        'db/insert_comment.php',
                    method:     'post',
                    success: function(result) {
                        console.log("success!");
                        console.log(result);    // result returns anything in html, anything that gets printed -VL
                    },
                    error: function(result) {
                        console.log("failure");
                        console.log(result);
                    }
                });
            });
        });
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
<view-project user-id="<?= $_SESSION['user_id'] ?>"></view-project>

<!-- Get the average rating for a specific project and display -VL -->
<?php

//    $p_id = $_GET["pid"];
//
//    require('db/mysql_connect.php');
//    // get comments for a specific project id -VL
//    $query = "
//            SELECT AVG (rating) AS avg
//            FROM `p_comments`
//            WHERE project_id=$p_id";
//
//    $result = mysqli_query($conn, $query);
//
//    if( mysqli_num_rows($result) ) {
//        while( $row = mysqli_fetch_assoc($result) ) {
//            $rating = $row;
//        }
//    }
//
//    print_r($rating);
//?>
<!---->
<!--<p> average rating: </p> --><?php //print($rating["avg"]) ?>

<!--Project comments, red flag and rating -VL -->



<p>
    average rating: <?php print(number_format($rating["avg"],1)) ?>
</p>

<!--User can input project comments, red flag and rating -VL -->
<form id="comment_project">
    <!-- checking the box will increment proj_red_flag by 1 upon hitting the submit button -VL -->
    <input type="checkbox" name="proj_red_flag" value=1> Flag this project <br>
    Please rate project (1 = bad, 5= good):
    <input type="number" name="proj_rating" min="1" max="5">

    <!-- this is needed to pass the project id into insert_comment.php -VL go ahead and hide this, but don't delete -->
    <input type="text" value="<?php print($_GET["pid"]); ?>" name="p_id">

    <md-input-container flex="40" flex-offset="30" layout="row">
        <label>Enter comments</label>
        <textarea ng-model="project.description" name="proj_comment" ></textarea>

        <div layout="row" layout-align="end start" flex="90">
            <md-button class="md-raised md-warn" layout-align="right" style="background-color: #00BFA5">Submit</md-button>
        </div>
    </md-input-container>
</form>


<!-- Gather all comments for the project -VL -->
<?php

//    $query = "
//        SELECT `comment_text`, `rating`, `comment_date`
//        FROM `p_comments`
//        WHERE project_id=$p_id";
//
//    $output = [];
//    $result = mysqli_query($conn, $query);
//
//    if( mysqli_num_rows($result) ) {
//        while( $row = mysqli_fetch_assoc($result) ) {
//            $output[] = $row;
//        }
//    }
//?>

<!--<div class="comment_container">-->
<!--    <div>-->
<!--        <h2>Comments</h2> <br>-->
<!--            --><?php
//                if (count($output) > 0) {
//                    foreach($output as $key => $value) {
//                        $date_time = date_create($value["comment_date"]);
//                        echo date_format($date_time, "M d Y, H:i ");
//
//                        if ($value["rating"] > 0 && $value["rating"] < 6) {
//                            print(" Rating: ");
//                            echo ($value["rating"]);
//                        }
//            ?>
<!--<!--                <br>-->-->
<!--            --><?php
////                        print("rating: ");
////                        print_r($value["rating"]);
//            ?>


<!--side nav-->
<side-panel></side-panel>
<footer></footer>
</body>
</html>