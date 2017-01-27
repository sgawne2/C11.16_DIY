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
                data:       $("#crude_submit_page_insert_form").serialize(),  // Serialize grabs the text from a form element
                dataType:   'text',
                url:        'crude_db_insert.php',
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
        <form id="crude_submit_page_insert_form">
            <!-- project -->
            Project Name:
            <input type="text" name="proj_name"><br>
            Photo URL (optional):
            <input type="text" name="main_photo"><br>

            <!-- Within $_POST, we put each tool into an associative array, so we can get the number of tools used for the project -->
            <!-- in crude_db_insert.php, we use count($_POST["tools"]) to get tool_count, which is a field within the "projects" table -->
            <br> Tool Name:
            <input type="text" name="tools[tool1]"><br>
            Tool Name:
            <input type="text" name="tools[tool2]"><br>
            Tool Name:
            <input type="text" name="tools[tool3]"><br>
            Tool Name:
            <input type="text" name="tools[tool4]"><br>
            Tool Name:
            <input type="text" name="tools[tool5]"><br>

            <br> Step Number:
            <input type="number" name="stp1_num"><br>
            Step Name:
            <input type="text" name="stp1_name"><br>
            Step Text:
            <input type="text" name="stp1_txt"> <br>
            URL for Step Photo:
            <input type="text" name="stp1_pic"><br>

            <br> Step Number:
            <input type="number" name="stp2_num"><br>
            Step Name:
            <input type="text" name="stp2_name"><br>
            Step Text:
            <input type="text" name="stp2_txt"> <br>
            URL for Step Photo:
            <input type="text" name="stp2_pic"><br>

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" id="submitButton">submit</button>
        </form>
    </body>
</html>
