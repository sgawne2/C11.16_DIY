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
                    data:       $("#p_instructions_insert_form").serialize(),  // Serialize grabs the text from a form element
                    dataType:   'text',
                    url:        'p_instructions_db_insert.php',
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
        <form id="p_instructions_insert_form">
            Project ID:
            <input type="number" name="one"><br>
            Step Number:
            <input type="number" name="two"><br>
            Step Name:
            <input type="text" name="three"><br>
            Step Text:
            <input type="text" name="four"> <br>
            URL for photo:
            <input type="text" name="five"><br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" id="submitButton">submit</button>
        </form>
    </body>
</html>
