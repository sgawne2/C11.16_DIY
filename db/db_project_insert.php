<!-- Gyver project   Vernon Louie    January 23, 2017    -->
<!-- db_project_insert.php -->

<?php
    session_start();
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('gyver_connect.php');

    $name = $_POST["name"];
    $photo = $_POST["photo"];
    $AuthorID = $_POST["AuthorID"];
    $step1 = $_POST["step1"];
    $step2 = $_POST["step2"];

//    $n = 3;

    $array = [];
    $array[] = $step1;
    $array[] = $step2;

//    for ($j = 1; $j < $n; ++$j) {
//        $array[] = $
//        $step_number = "$step"."$j";
//        print_r($step_number);
//        print($step_number);
//        $array[] = $step_number;
//    }

//    $array[] = $_POST["step1"];
//    $array[] = $step2[""];

    /* ensure that the values are enclosed in quotes */
    $query = "INSERT INTO `projects` (`Name`, `photo`, `AuthorID`) VALUES ('$name', '" . addslashes($photo) . "', '$AuthorID')";
    $query = "INSERT INTO `projects` SET 
                '$name',                
                photo='" . addslashes($photo) . "',
                authorID='" . intval($AuthorID) . "')";
    print("\n".$query);
    $result = mysqli_query($conn, $query);

    /* if inserting, then mysqli_affected_rows will return the auto-incremented field value; in this case, $id */
    if (mysqli_affected_rows($conn) > 0) {
        $id = mysqli_insert_id($conn);
        print($id);
    } else {
        print("I failed");
    }

    for ($i = 0; $i < count($array); $i++) {
        $step_num = $i+1;
        $query = "INSERT INTO `projectinstructions` (`projectID`, `step`, `stepText`) VALUES ('$id', '$step_num', '$array[$i]')";
        $result = mysqli_query($conn, $query);
    }

    /* If you do another POST, does that wipe out the original $_POST? */
?>
