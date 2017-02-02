<?php
    /* mySQL_connect.php has $conn, which uses mysqli_connect */
    require('mysql_connect.php');

    $proj_id = addslashes($_POST["p_id"]);
    $proj_comment = addslashes($_POST["proj_comment"]);

//    print("howdy!");
//    print_r($proj_comment);

    if ($proj_comment === "") {
        print("Not adding comments, because there is no text");
    } else {
        $query = "INSERT INTO `p_comments` SET
            `project_id` = $proj_id,
            `comment_text` = '$proj_comment' " ;

        $result = mysqli_query($conn, $query);
    }

?>