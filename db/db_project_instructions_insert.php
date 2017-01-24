<!-- Gyver project   Vernon Louie    January 23, 2017    -->
<!-- db_project_insert.php -->

<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    print_r($_POST);

    $name = $_POST["name"];
    $photo = $_POST["photo"];
    $AuthorID = $_POST["AuthorID"];

    print_r($name);
    print_r($photo);
    print_r($AuthorID);

    /* ensure that the values are enclosed in quotes */
    $query = "INSERT INTO `projects` (`Name`, `photo`, `AuthorID`) VALUES ('$name', '$photo', '$AuthorID')";
    print("\n".$query);
    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("I failed");
    }


?>