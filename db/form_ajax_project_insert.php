<!-- Gyver project   Vernon Louie    January 23, 2017    -->
<!-- form_ajax_project_insert.php -->

<?php

    /* The following commented code is used to read from the database */
        //    require('gyver_connect.php');
        //
        //    $query = "SELECT * FROM `projects`";
        //
        //    $result = mysqli_query ($conn, $query);
        //
        //    $output = [];
        //
        //    if ($result) {
        //        while($row = mysqli_fetch_assoc($result)) {
        //            $output[] = $row;
        //        }
        //    }
        //
        //    print_r($output);

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
        <form id="abc">
            Project Name:
            <input type="text" name="name"><br>
            Photo URL (optional):
            <input type="text" name="photo"><br>
            Author_id:
            <input type="text" name="AuthorID"> <br>
            Step 1:
            <input type="text" name="step1"><br>
            Step 2:
            <input type="text" name="step2"><br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" class="fun">submit</button>
        </form>
    </body>
</html>
