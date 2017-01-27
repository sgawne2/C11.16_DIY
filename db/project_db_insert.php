
<?php
    session_start();

    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $name = $_POST["name"];
    $tool_count = $_POST["toolcount"];
    $photo = $_POST["photo"];
    $author_id = $_POST["AuthorID"];
    $step1 = $_POST["step1"];
    $step2 = $_POST["step2"];

    $array = [];
    $array[] = $step1;
    $array[] = $step2;

    /* ensure that string values are enclosed in single quotes */
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

    for ($i = 0; $i < count($array); $i++) {
        $step_num = $i+1;

        $query = "INSERT INTO `p_instructions` SET 
            `project_id` = $id, 
            `step_number` = $step_num,
            `step_text` = '$array[$i]' ";

        $result = mysqli_query($conn, $query);
    }
?>
