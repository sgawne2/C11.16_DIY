<md-toolbar layout="column" ng-controller="AppCtrl">
    <div class="md-toolbar-tools">
        <div class="logo"></div>
        <h2><a href="index.php">Mac<span class="tealText">diy</span>ver</a></h2>
        <span flex=""></span>


        <md-button><a href="submit_project.php">Submit Project</a></md-button>
        <?php
        if ($_SESSION['user_name']) {
//            echo '<md-button id="profile-btn"><a href="my_profile.php?uid=' . $_SESSION['uid'] . '">' . $_SESSION['user_name'] . '</a></md-button>';
        }
        ?>
        <!--<md-button id="profile-btn" style="display:none"><a href="my_profile.php">My Profile</a></md-button>-->
        <!--<md-button id="signout" style="display:none" onclick="signOut()">Log out</md-button>-->
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>
        <script>
            function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();

                // The ID token you need to pass to your backend:
                var id_token = googleUser.getAuthResponse().id_token;

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
//                            console.log(response);
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