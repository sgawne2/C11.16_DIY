<!-- Gyver project   Vernon Louie    January 23, 2017    -->

<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $one = $_POST["one"];
    $two = $_POST["two"];
    $three = $_POST["three"];
    $four = $_POST["four"];
    $five = $_POST["five"];

    /* ensure that the string variables are enclosed in single quotes */
    $query = "INSERT IGNORE INTO `tools` (`tool_name`) VALUES ('$one'), ('$two'), ('$three'), ('$four'), ('$five')";

//    $query = "INSERT IGNORE INTO `tools` SET
//        `tool_name` = '$one', $two, '$three', '$four', '$five' ";
//        `tool_name` = $two,
//        `tool_name` = '$three',
//        `tool_name` = '$four',
//        `tool_name` = '$five' ";

    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("Failure");
    }
?>