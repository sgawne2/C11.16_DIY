<?php
    session_start();

    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    // INSERT INTO "PROJECTS" TABLE ***************************************************
    $proj_name = $_POST["proj_name"];
//    $main_photo = $_POST["main_photo"];

    // get tool_count, because it also goes into "projects" table
//    $tool_count = count($_POST["tools"]);
//?    print("tool count: ".$tool_count);

    $query_proj = "INSERT INTO `projects` SET
                    `project_name` = '$proj_name' ";
//, `tool_count` = $tool_count,                 `project_photo` = '$main_photo' ";

    print("\n".$query_proj);
    $result_proj = mysqli_query($conn, $query_proj);    // insert action

    if (mysqli_affected_rows($conn) > 0) {      // get project_id of newly inserted project = $id
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("Failure");
    }
?>