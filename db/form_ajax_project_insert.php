<!-- Gyver project   Vernon Louie    January 23, 2017    -->
<!-- form_ajax_project_insert.php -->

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
                    data:       $("#project_insert_form").serialize(),  // Serialize grabs the text from a form element
                    dataType:   'text',
                    url:        'db_project_insert.php',
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
        <form id="project_insert_form">
            Project Name:
            <input type="text" name="name"><br>
            Tool Count:
            <input type="text" name="toolcount"><br>
            Photo URL (optional):
            <input type="text" name="photo"><br>
            Author_id:
            <input type="text" name="AuthorID"> <br>
            Step 1:
            <input type="text" name="step1"><br>
            Step 2:
            <input type="text" name="step2"><br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" id="submitButton">submit</button>
        </form>
    </body>
</html>

