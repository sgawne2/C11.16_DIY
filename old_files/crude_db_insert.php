<?php
    /* mysql_connect.php has $conn, which uses mysqli_connect */
    require('../db/mysql_connect.php');

    // INSERT INTO "PROJECTS" TABLE ***************************************************
//    $proj_name = $_POST["proj_name"];
//    $main_photo = $_POST["main_photo"];

        // get tool_count, because it also goes into "projects" table
//    $tool_count = count($_POST["tools"]);
//    print("tool count: ".$tool_count);

//    $query_proj = "INSERT INTO `projects` SET
//                `project_name` = '$proj_name',
//                `tool_count` = $tool_count,
//                `project_photo` = '$main_photo' ";

//    print("\n".$query_proj);
//    $result_proj = mysqli_query($conn, $query_proj);    // insert action
//
//    if (mysqli_affected_rows($conn) > 0) {      // get project_id of newly inserted project = $id
//        $id = mysqli_insert_id($conn);
//        print($id);
//    } else {
//        print("Failure");
//    }


    // INSERT INTO "P_INSTRUCTIONS" TABLE ***************************************************
//    $stp1_num = $_POST["stp1_num"];
//    $stp1_name = $_POST["stp1_name"];
//    $stp1_txt = $_POST["stp1_txt"];
//    $stp1_pic = $_POST["stp1_pic"];
//
//    $stp2_num = $_POST["stp2_num"];
//    $stp2_name = $_POST["stp2_name"];
//    $stp2_txt = $_POST["stp2_txt"];
//    $stp2_pic = $_POST["stp2_pic"];

        // IGNORE allows for inserting multiple records  ALSO $id doesn't come from $_POST, rather from my_sqli_affected_row()
//    $query_p_instructions = "INSERT IGNORE INTO `p_instructions`
//        (`project_id`, `step_number`, `step_name`, `step_text`, `step_photo`)
//    VALUES
//        (($id), ($stp1_num), ('$stp1_name'), ('$stp1_txt'), ('$stp1_pic')),
//        (($id), ($stp2_num), ('$stp2_name'), ('$stp2_txt'), ('$stp2_pic')) ";

//    print("\n".$query_p_instructions);
//    $result_p_instructions = mysqli_query($conn, $query_p_instructions);    // insert action

    // INSERT INTO "TOOLS" TABLE ***************************************************
    $tool1_name = $_POST["tools"][0]['t_name'];
    $tool2_name = $_POST["tools"][1]['t_name'];
    $tool_name_array[] = $tool1_name;
    $tool_name_array[] = $tool2_name;
//    $tool3_name = $_POST["tools"][2]["t_name]"];
//    $tool4 = $_POST["tools"]["tool4"];
//    $tool5 = $_POST["tools"]["tool5"];

        // IGNORE allows for inserting multiple records and together with tool being set to "UNIQUE" in mySQL, does not allow for duplicate tools
    $query_tools = "INSERT IGNORE INTO `tools` (`tool_name`) VALUES ('$tool1_name'), ('$tool2_name')";

    print("\n".$query_tools);
    $result_tools = mysqli_query($conn, $query_tools);  // insert action

    // INSERT INTO "MAP_TU" TABLE ***************************************************
        // "implode" makes a single string out of array elements separated by whatever is in double quotes
    $string_of_tools =  "'" . implode("', '", $tool_name_array). "'";
    $query = "SELECT `tool_id` FROM `tools` WHERE tool_name IN ($string_of_tools) ORDER BY `tool_id` ASC";
    $result = mysqli_query($conn, $query);    // select action

    $tool_id_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tool_id_arr[] = $row;
    }
    print_r($tool_id_arr);

//    $query_p_maptp = "INSERT IGNORE INTO `map_tp`
//            (`project_id`, `tool_id`)
//        VALUES
//            (($id), ($)),
//            (($id), ($stp2_num)) ";

    $user_id = $_POST["user_id"];

    for ($i = 0; $i < count($tool_id_arr); $i++) {
        $output[] = "(". $user_id . ", " . $tool_id_arr[$i]['tool_id'] . ", '" . $_POST["tools"][$i]["t_description"] .  "')"   ;
    }

    $string_of_tool_IDs = implode(", ", $output);
    print("string of tool IDs: " . $string_of_tool_IDs);

    $query_map_tu = "INSERT IGNORE INTO `map_tu` 
        (`user_id`, `tool_id`, `tool_description`) 
    VALUES 
        $string_of_tool_IDs ";

    print_r("\n".$query_map_tu);
    $result = mysqli_query($conn, $query_map_tu);    // insert action

?>