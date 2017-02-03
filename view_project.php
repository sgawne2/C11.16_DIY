<html lang="en" >
<head>
    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Google Analytics tracking code -VL -->
    <?php include_once("google_analytics.php") ?>

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
<view-project></view-project>

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
<add-comment></add-comment>

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

<div class="comment_container">
    <div>
        <h2>Comments</h2> <br>
            <?php
                if (count($output) > 0) {
                    foreach($output as $key => $value) {
                        $date_time = date_create($value["comment_date"]);
                        echo date_format($date_time, "M d Y, H:i ");

                        if ($value["rating"] > 0 && $value["rating"] < 6) {
                            print(" Rating: ");
                            echo ($value["rating"]);
                        }
            ?>
<!--                <br>-->
            <?php
//                        print("rating: ");
//                        print_r($value["rating"]);
            ?>
                <br>
            <?php
                        print_r($value["comment_text"]);
            ?>
                <br><br>
            <?php
                    }
                } else {
                    print("No comments for this project at this time.  Be the first to comment!");
                }
            ?>
    </div>
</div>

<!--side nav-->
<div ng-controller="AppCtrl" layout="column" ng-cloak>
    <section layout="row" flex class="side-tool-list">
        <md-sidenav class="md-sidenav-left" md-component-id="left"
                    md-disable-backdrop md-whiteframe="4" style="position:fixed; top:64px;">
            <md-toolbar>
                <h1 class="md-toolbar-tools" style="background-color: #00BFA5;">Pick the tools you have!</h1>
            </md-toolbar>
            <md-content layout-margin>
                <p>Select you category of interest and then check the items that you have to get your project started</p>

                <!--left side tool category list-->
                <button class="accordion"
                        style="background-color: #00BFA5; color:white;"><b>Woodworking</b></button>
                <div class="panel">
                    <!--woodworking tool list-->
                    <ul>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Hammer</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Nails</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screwdriver</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Saw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">X-acto Blade</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screws</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Crowbar</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Bansaw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Allen Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Monkey Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wood</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Plumbing Pipes</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Electrical Wires</md-checkbox></li>
                    </ul>
                </div>

                <button class="accordion"
                        style="background-color: #00BFA5; color:white;"><b>Technology</b></button>
                <div class="panel">
                    <!--technology tool list-->
                    <ul>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Hammer</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Nails</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screwdriver</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Saw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">X-acto Blade</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screws</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Crowbar</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Bansaw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Allen Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Monkey Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wood</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Plumbing Pipes</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Electrical Wires</md-checkbox></li>
                    </ul>
                </div>

                <button class="accordion"
                        style="background-color: #00BFA5; color:white;"><b>Arts & Crafts</b></button>
                <div class="panel">
                    <!--arts & crafts tool list-->
                    <ul>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Hammer</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Nails</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screwdriver</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Saw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">X-acto Blade</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Screws</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Crowbar</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Bansaw</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Allen Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Monkey Wrench</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Wood</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Plumbing Pipes</md-checkbox></li>
                        <li><md-checkbox class="orangeCheckBox" [checked]="todo.completed">Electrical Wires</md-checkbox></li>
                    </ul>
                </div>

            </md-content>
        </md-sidenav>
    </section>
</div>

<script src="js/accordionPanel.js"></script>

</body>
</html>