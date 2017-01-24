<!-- php_mysql dynamic database query   Vernon Louie    January 20, 2017    -->
<!-- form_ajax.php -->

<?php
    session_start();
?>

<html>
    <!-- include the jQuery library as we are using jQuery functions -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fun").click(function() {
                console.log("inside click handler");
                $.ajax({
                    data:       $("#abc").serialize(),  // Serialize grabs the text from a form element
                    dataType:   'text',
                    url:        'index_insert.php',
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
        <form id="abc">
            Title:
            <input type="text" name="title"><br>
            Details:
            <input type="text" name="details"><br>
            Timestamp:
            <input type="text" name="timestamp"><br>
            User_id:
            <input type="text" name="userid"> <br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" class="fun">submit</button>
        </form>
    </body>
</html>

