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
    <script src="js/components/viewProject/viewProject.component.js"></script>
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