<!-- Gyver project   Vernon Louie    January 23, 2017    -->

<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $name = $_POST["name"];

    /* ensure that the string variables are enclosed in single quotes */
    $query = "INSERT INTO `tools` SET 
        `tool_name` = '$name' ";

    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("Failure");
    }
?>