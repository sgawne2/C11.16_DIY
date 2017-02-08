<?php
    require('mysql_connect.php');

    /* following line is to make $_POST as php expects when using $http (angular way of AJAX) -VL */
    $_POST = json_decode(file_get_contents('php://input'), true);

    $proj_id = addslashes( $_POST["proj_id"] );

    if ($proj_id === "") {
        print ("Project ID is blank.  Not retrieving rating.");
    } else {
        $query = "
            SELECT AVG (rating) AS avg
            FROM `p_ratings`
            WHERE project_id = $proj_id";

        $result = mysqli_query($conn, $query);

        if( mysqli_num_rows($result) ) {
            while( $row = mysqli_fetch_assoc($result) ) {
                $row["avg"] = number_format($row["avg"],1);     // display avg with 1 decimal place
                $rating = $row;
            }
        }

        $rating_json = json_encode($rating);
        echo ($rating_json);
    }
?>