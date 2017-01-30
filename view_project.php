<?php
require('./db/mysql_connect.php');
$pid = $_GET['pid'];
//get the tools for a specific project id
$tools_pid = "
SELECT p.project_id, p.project_name, t.tool_name, p.project_photo, p.project_description
FROM `map_tp` AS `map`
JOIN `projects` AS `p`
	ON p.project_id = map.project_id
JOIN `tools` AS `t`
	ON t.tool_id = map.tool_id
WHERE p.project_id = " . $pid;

//get the steps for a specific project id
$steps_pid = "
SELECT p.project_name, i.step_number, i.step_text
FROM `p_instructions` AS `i`
JOIN `projects` AS `p`
	ON i.project_id = p.project_id
WHERE p.project_id = " . $pid;

$query = $steps_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    $steps = $output;
}

$query = $tools_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    $tools = $output;
}
?>
<html lang="en" >
<head>
    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" type="text/css" href="style.css">

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
</head>
<body ng-app="diyApp">

<!--sticky header-->
<md-toolbar layout="column" ng-controller="AppCtrl">
    <div class="md-toolbar-tools">

        <!--hamburger icon-->
        <md-button ng-click="toggleLeft()"><md-icon md-font-set="material-icons">dehaze</md-icon></md-button>

        <!--<div class="logo"></div>-->
        <h2><a href="index.html">Mac<span class="boldText">DIY</span>ver</a></h2>
        <span flex=""></span>


        <md-button><a href="submit_project.html">Submit Project</a></md-button>
        <md-button>My Profile</md-button>
        <md-button>Login</md-button>
    </div>
</md-toolbar>

<div layout="column" style="height:5%;"></div>

<!--main content-->


    <!--<md-card flex="70" flex-offset="15">-->
        <!--<div style="background-color: #00BFA5; color:white; width:100%">-->
            <!--<h2>CPU Drone</h2>-->
        <!--</div>-->

        <!--<md-card-content>-->
            <!--<p style="line-height: 140%">This is a short description of the project. Nunc nisi dolor, hendrerit mollis elit vel, rutrum congue diam. Donec eget felis ullamcorper, pellentesque magna in, laoreet tortor. Aliquam commodo suscipit libero id ultrices. Mauris lectus lorem, accumsan ac hendrerit vitae, luctus in orci. Aenean sit amet dui mi. </p>-->
            <!--<h3>Required Tools</h3>-->

                <!--<ul>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->
                    <!--<li>efgfd</li>-->

                <!--</ul>-->

        <!--</md-card-content>-->

    <!--</md-card>-->

<div flex="70" flex-offset="15" style="border-top:none; box-shadow: 0px 1px 6px 0px #bababa; border-bottom-right-radius:3px;
border-bottom-left-radius:3px;">
    <div style="background-color: #00BFA5; color:white; width:100%; height:70px;line-height: 70px;">
        <h2 style="margin:0"><?= $tools[0]['project_name']; ?></h2>
    </div>
    <div style="border-top:none; padding:15px; box-shadow: 0px 1px 1px 0px #c2c2c2; line-height: 140%">
        <p><?= $tools[0]['project_description']; ?></p>
        <h3>Required Tools</h3>
        <ul>
            <?php
                foreach($tools as $tool) {
                    echo "<li>" . $tool['tool_name'] . "</li>";
                }
            ?>
        </ul>
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