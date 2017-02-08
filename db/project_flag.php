<?php
    require('mysql_connect.php');
    $_POST = json_decode(file_get_contents('php://input'), true);

    $proj_id = addslashes( ($_POST["proj_id"]) );

    if ($proj_id === "") {
        print("Project ID is blank.  Not updating database.");
    } else {
        /* increment proj_red_flag in table "projects" by 1 -VL */
        $query = "UPDATE `projects` 
              SET `proj_red_flag` = proj_red_flag + 1  
              WHERE `project_id` = $proj_id";

        $result = mysqli_query($conn, $query);  // do the actual update -VL

        print("affected rows: " . mysqli_affected_rows($conn) );
        if (mysqli_affected_rows($conn) < 1) {
            print("The update did not work.");
        } else {
            print("The update worked.");
        }
    }
?>