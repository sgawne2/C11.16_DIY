<?php
    /* mySQL_connect.php has $conn, which uses mysqli_connect */
    require('mysql_connect.php');

    $proj_id = addslashes($_POST["p_id"]);
    $proj_comment = addslashes($_POST["proj_comment"]);
    $proj_rating = addslashes($_POST["proj_rating"]);

    print("POST: "); print_r($_POST);
    print("proj_comment: " . $proj_comment);
    print("proj_rating: " . $proj_rating);

    /* proj_red_flag is set to 1 if the checkbox is checked in view_project.php; otherwise it's undefined */
    if (isset($_POST["proj_red_flag"])) {
        $proj_red_flag = addslashes($_POST["proj_red_flag"]);
    } else {
        $proj_red_flag = 0;
    }

//    print("howdy!");
//    print_r($proj_comment);

    if ($proj_comment === "" && ($proj_rating < 1 || $proj_rating > 5) ) {
        print("Not adding comments and rating, because there is no comment and rating is not between 1 and 5 inclusive.");
    } else {
        $query = "INSERT INTO `p_comments` SET
            `project_id` = $proj_id,
            `comment_text` = '$proj_comment',
            `rating` = '$proj_rating' ";

        $result = mysqli_query($conn, $query);
    }

    $query = "UPDATE `projects` 
              SET proj_red_flag = proj_red_flag + 1
              WHERE project_id = $proj_id";

    $result = mysqli_query($conn, $query);
?>