<html lang="en" >
<head>
    <!--Angular Material Style Sheets-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
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
    <script src="js/components/addPhoto/addPhoto.component.js"></script>
    <script src="js/components/sidePanel/sidePanel.component.js"></script>

    <script>
        $(document).ready(function() {
            $(".md-raised").click(function() {
                console.log("inside click handler");
                var formEle = $('#project_form')[0];
                var data = new FormData(formEle);
                $.ajax({
                    data:       data,
                    url:        'db/insert_project.php',
                    method:     'POST',
                    mimeType: "multipart/form-data",
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        console.log("success!");
                        console.log(result);    // result returns anything in html, anything that gets printed -VL
                    },
                    error: function(result) {
                        console.log("failure");
                        console.log(result);
                    }
                })
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
        <md-button><a href="my_profile.php">My Profile</a></md-button>
        <md-button>Login</md-button>
    </div>
</md-toolbar>

<div layout="column" style="height:5%;"></div>

<!--Project Title Input-->
<form id="project_form" method="POST" action="db/insert_project.php" enctype="multipart/form-data">
<md-list-item>
    <md-input-container class="add-form-input" layout="row" layout-align="center" flex="40" flex-offset="30">
        <label for="add-todo">Project Title &nbsp;(Photo Required)</label>
        <input id="add-todo" type="text" name = "proj_name">
    </md-input-container>

    <add-photo></add-photo>
</md-list-item>

    <div layout="column" style="height:5%;"></div>

    <!--Project Description Input-->
    <md-input-container flex="40" flex-offset="30" layout="row">
        <label>Short Project Description</label>
        <textarea ng-model="project.description" name="proj_descrip" ></textarea>
    </md-input-container>

    <!--Angular Tool Selector Component-->
    <tool-selector></tool-selector>

    <!--Angular Project Steps Component-->
    <add-steps></add-steps>

    <md-content>
        <div layout="column" style="height:3%;"></div>
        <p style="font-size:18px; text-align:center">Do you wish to pay $20 to have your project <b>featured</b> on our home page?</p>
<!--        <input type="radio" name="is_featured" value=1> Yes <br>-->
<!--        <input type="radio" name="is_featured" value=0> No-->

        <md-radio-group ng-model="featuredProjectChoice" layout="row" layout-align="center">
            <md-radio-button value="yes" class="md-warn">Yes</md-radio-button>
            <md-radio-button value="no" class="md-warn">No Thanks</md-radio-button>
        </md-radio-group>
        <div layout="column" style="height:3%;"></div>

    </md-content>

    <div layout="row" layout-align="end start" flex="90">
        <md-button class="md-raised md-warn" layout-align="right" style="background-color: #00BFA5" ng-click="$ctrl.submit">Submit</md-button>
    </div>
</form>


<!--side nav-->
<side-panel></side-panel>

</body>
</html>