
<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $name = $_POST["name"];
    $tool_count = $_POST["toolcount"];
    $photo = $_POST["photo"];
    $author_id = $_POST["AuthorID"];


/* ensure that the values are enclosed in quotes */
//    $query = "INSERT INTO `projects` (`Name`, `photo`, `AuthorID`) VALUES ('$name', '" . addslashes($photo) . "', '$AuthorID')";

    $query = "INSERT INTO `projects` SET
                `project_name` = '$name',
                `tool_count` = $tool_count,
                `project_photo` = '$photo',
                `author_id` = $author_id ";
    print("\n".$query);
    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("Failure");
    }
