<!-- Gyver project   Vernon Louie    January 23, 2017    -->

<?php
    session_start();
?>

<html>
<!-- include the jQuery library as we are using jQuery functions -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".submitButton").click(function() {
                console.log("inside click handler");
                $.ajax({
                    data:       $("#tool_insert_form").serialize(),  // Serialize grabs the text from a form element
                    dataType:   'text',
                    url:        'db_tool_insert.php',
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
    <form id="tool_insert_form">
        Tool Name:
        <input type="text" name="name"><br>

        <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
        <button type="button" class="submitButton">submit</button>
    </form>
    </body>
</html>
