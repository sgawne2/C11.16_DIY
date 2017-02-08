<?php
    require('mysql_connect.php');

    /* following line is to make $_POST as php expects when using $http (angular way of AJAX) -VL */
    $_POST = json_decode(file_get_contents('php://input'), true);

    print("POST: "); print_r($_POST);
    $proj_id = addslashes( $_POST["proj_id"] ) ;
    $user_id = addslashes( $_POST["user_id"] ) ;
    $proj_rating = addslashes( $_POST["proj_rating"] ) ;

    if ( ($proj_id === "" || $user_id === "") || ($proj_rating < 1 || $proj_rating > 5) ) {
        print("Project ID or user id is blank or project rating is not within 1 and 5.  Not inserting into database.");
    } else {
        $query = "INSERT INTO `p_ratings` SET            
              `project_id` = $proj_id,
              `user_id` = $user_id,           
              `rating` = $proj_rating
            ON DUPLICATE KEY UPDATE
              `rating` = $proj_rating " ;

        $result = mysqli_query($conn, $query);      // do the actual insert -VL

        if (mysqli_affected_rows($conn) > 0) {      // Get comment_id of newly inserted comment = $id
            $id = mysqli_insert_id($conn);
            print("Comment ID: " . $id . "\n");
        } else {
            print("\n Failure to insert rating andor comment\n");
        }
    }
?>