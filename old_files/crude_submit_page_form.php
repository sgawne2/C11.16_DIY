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
<!--            Project Name:-->
<!--            <input type="text" name="proj_name"><br>-->
<!--            Photo URL (optional):-->
<!--            <input type="text" name="main_photo"><br>-->

            <!-- Within $_POST, we put each tool into an associative array, so we can get the number of tools used for the project -->
            <!-- in crude_db_insert.php, we use count($_POST["tools"]) to get tool_count, which is a field within the "projects" table -->
            <br> User ID:
            <input type="number" name="user_id"><br>
            <br> Tool Name:
            <input type="text" name="tools[0][t_name]"><br>
            Tool Description (optional):
            <input type="text" name="tools[0][t_description]"><br>
            <br> Tool Name:
            <input type="text" name="tools[1][t_name]"><br>
            Tool Description (optional):
            <input type="text" name="tools[1][t_description]"><br>
<!--            <br> Tool Name:-->
<!--            <input type="text" name="tools[]['t_name']"><br>-->
<!--            Tool Description (optional):-->
<!--            <input type="text" name="tools[]['t_description']"><br>-->
<!--            Tool Name:-->
<!--            <input type="text" name="tools[]"><br>-->
<!--            Tool Name:-->
<!--            <input type="text" name="tools[]"><br>-->

<!--            <br> Step Number:-->
<!--            <input type="number" name="stp1_num"><br>-->
<!--            Step Name:-->
<!--            <input type="text" name="stp1_name"><br>-->
<!--            Step Text:-->
<!--            <input type="text" name="stp1_txt"> <br>-->
<!--            URL for Step Photo:-->
<!--            <input type="text" name="stp1_pic"><br>-->

<!--            <br> Step Number:-->
<!--            <input type="number" name="stp2_num"><br>-->
<!--            Step Name:-->
<!--            <input type="text" name="stp2_name"><br>-->
<!--            Step Text:-->
<!--            <input type="text" name="stp2_txt"> <br>-->
<!--            URL for Step Photo:-->
<!--            <input type="text" name="stp2_pic"><br>-->

            <!-- if you don't make button type="button", then the page will refresh using the default class of "submit" -->
            <button type="button" id="submitButton">submit</button>
        </form>

        <?php
            require('mysql_connect.php');

            /* Join 3 tables together and get data from each */
            $query = "
                SELECT u.user_name, u.zip_code, t.tool_name, m.tool_description 
                FROM map_tu AS m
                JOIN users AS u ON m.user_id = u.user_id
                JOIN tools AS t ON m.tool_id = t.tool_id
                WHERE u.user_id=4
                " ;

            $output = [];

            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $output[] = $row;
                }
            }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Zip Code</th>
                    <th>Tools</th>
                    <th>Tool Description</th>

                </tr>
            </thead>
                <tr>
                    <td> <?php print($output[0]["user_name"]); ?> </td>
                    <td> <?php print($output[0]["zip_code"]); ?> </td>
                </tr>
        <?php
            foreach ($output as $key => $value) {
        ?>
            <tr>
                <td> </td>
                <td> </td>
                <td> <?php print($value["tool_name"]); ?> </td>
                <td> <?php print($value["tool_description"]); ?> </td>
            </tr>
        <?php
            }
        ?>
        </table>
    </body>
</html>
