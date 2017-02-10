<md-toolbar layout="column" ng-controller="AppCtrl">
    <div class="md-toolbar-tools">
<!--        <!--hamburger icon-->
<!--        <md-button ng-click="toggleLeft()"><md-icon md-font-set="material-icons">dehaze</md-icon></md-button>-->
        <div class="logo"></div>
        <h2><a href="index.php">Mac<span class="tealText">diy</span>ver</a></h2>
        <span flex=""></span>


        <md-button><a href="submit_project.php">Submit Project</a></md-button>
        <md-button id="profile-btn" style="display:none"><a href="my_profile.php">My Profile</a></md-button>
        <!--<md-button id="signout" style="display:none" onclick="signOut()">Log out</md-button>-->
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
        <script>
            function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();
                console.log("ID: " + profile.getId()); // Don't send this directly to your server!
                console.log('Full Name: ' + profile.getName());
                console.log('Given Name: ' + profile.getGivenName());
                console.log('Family Name: ' + profile.getFamilyName());
                console.log("Image URL: " + profile.getImageUrl());
                console.log("Email: " + profile.getEmail());

                // The ID token you need to pass to your backend:
                var id_token = googleUser.getAuthResponse().id_token;
                console.log("ID Token: " + id_token);
//                document.getElementById("profile-btn").setAttribute("style", "display:block");
//                document.getElementById("signout").setAttribute("style", "display:block");

                (function() {
                    $.ajax({
                        method: 'POST',
                        url: './db/google/authenticate.php',
                        data: {
                            id: profile.getId(),
                            last_name: profile.getFamilyName(),
                            first_name: profile.getGivenName(),
                            photo: profile.getImageUrl(),
                            email: profile.getEmail(),
                            token: id_token
                        },
                        success: function(response) {
                            console.log(response);
                        }
                    })
                })();
            }
            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.disconnect();
                auth2.signOut().then(function () {
                    console.log('User signed out.');
                    document.getElementById("signout").setAttribute("style", "display:none");
                });
            }
        </script>
    </div>
</md-toolbar>