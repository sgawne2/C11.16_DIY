<!-- MacDIYver project   Vernon Louie    January 23, 2017    -->

<?php
    session_start();
?>

<html>
    <!-- include the jQuery library as we are using jQuery functions -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#submitButton").click(function() {
                console.log("inside click handler");
                $.ajax({
                    data:       $("#users_insert_form").serialize(),  // Serialize grabs the text from a form element
                    dataType:   'text',
                    url:        'users_db_insert.php',
                    method:     'post',
                    success: function(result) {
                        console.log("success!");
                        console.log(result);    // result returns anything in html, anything that gets printed
                    },
                    error: function() {
                        console.log("failure");
                        console.log(result);
                    }
                })
            });
        });
    </script>

    <body>
        <form id="users_insert_form">
            Provider Name (1 or 2):
            <input type="number" name="one"><br>
            Provider ID:
            <input type="text" name="two"><br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" id="submitButton">submit</button>
        </form>
    </body>
</html>