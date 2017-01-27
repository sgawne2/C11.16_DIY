<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $one = $_POST["one"];
    $two = $_POST["two"];
    $three = $_POST["three"];
    $four = $_POST["four"];
    $five = $_POST["five"];

    /* ensure that string values are enclosed in single quotes */
    $query = "INSERT INTO `p_instructions` SET
                `project_id` = $one,
                `step_number` = $two,
                `step_name` = '$three',
                `step_text` = '$four',
                `step_photo` = '$five' ";

    print("\n".$query);
    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("Failure");
    }
?>
