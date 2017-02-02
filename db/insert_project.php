<?php
    /* mySQL_connect.php has $conn, which uses mysqli_connect */
    require('mysql_connect.php');

    /* Initialize variables: */
    $tool_qty_negativeORzero = false;

    /* Required for INSERT (1 of 4) into "Projects" table *********************************************/
    $proj_name = addslashes($_POST["proj_name"]);
    $proj_descrip = addslashes($_POST["proj_descrip"]);
    $is_featured = addslashes($_POST["is_featured"]);
//    $main_photo = addslashes($_POST["main_photo"]);

        /* Get tool_count, because it also goes into "projects" table */
    $tool_array =($_POST["tools"]);
    $tool_qty_array = $_POST["t_qty"];
    $array_length_for_now = count($tool_array);

        /* Sanitize, look for and delete any empty strings in the tools array */
    for ($c = $array_length_for_now; $c >= 1; $c--) {
        $tool_array[$c] = addslashes($tool_array[$c]);
        $tool_qty_array[$c] = addslashes($tool_qty_array[$c]);
        //        print("toolname: " . $toolName);

        if ($tool_array[$c] === "") {
            unset($tool_array[$c]);         // "unset" removes from array
            unset($tool_qty_array[$c]);     // remove corresponding tool_qty

            for ($d = $c; $d < $array_length_for_now; $d++) {
                $tool_array[$d] = $tool_array[$d+1];
                $tool_qty_array[$d] = $tool_qty_array[$d+1];  // shift array elements to the "left" by 1
            }
            /* Delete the array element at the end, since it has already been copied/shifted over & get new array length */
            unset($tool_array[$array_length_for_now]);
            unset($tool_qty_array[$array_length_for_now]);
            $array_length_for_now = count($tool_array);
        }
    } // End of outer loop

        /* Check for non-positive tool quantities and flag */
    foreach ($tool_qty_array as $key => $qty_value ) {
        if ($qty_value < 1) {
            $tool_qty_negativeORzero = true;
            break;
        }
    }

    $tool_count = count($tool_array);       // tool_count foes into "projects" table
    /* Required for INSERT (1 of 4) into "Projects" table - END *********************************************/


    /* Required for INSERT (2 of 4) into "p_instructions" table ***************************************/
    $steps_array = ($_POST["steps"]);
//    print("\n BEFORE: steps_array: ");    print_r($steps_array);

    $array_length_for_now = count($steps_array);
        /* Look for any empty step text input; if any, delete that particular step object from $steps_array */
    for ($a = $array_length_for_now; $a >= 1; $a--) {
        $text_4that_step = $steps_array[$a]["text_fields"]["stp_txt"];

        if ($text_4that_step === "") {
            unset($steps_array[$a]);
            for ($b = $a; $b < $array_length_for_now; $b++) {
                //                    print_r($steps_array);
                $steps_array[$b] = $steps_array[$b+1];  // shift array elements to the "left" by 1
            }
                /* Delete the array element at the end, since it has already been copied/shifted over & get new array length */
            unset($steps_array[$array_length_for_now]);
            $array_length_for_now = count($steps_array);
        }
    } // End of outer for loop
    /* Required for INSERT (2 of 4) into "p_instructions" table END ***************************************/


    // Execute MINIMUM FIELDS CHECK before proceeding to database insertions:
    if ( ($proj_name === "" || $tool_count < 1) || (count($steps_array) < 1 || $tool_qty_negativeORzero === true) ) {
        print("You have not entered in all required fields or tool quantity is not a positive number");
    }

    print("\n Project name:" . $proj_name);
    print("\n tool_array: \n"); print_r($tool_array);
    print("\n steps_array: \n"); print_r($steps_array);


    // INSERT (1 of 4) INTO "PROJECTS" TABLE ***************************************************
    print("\n tool count: " . $tool_count . "\n");
    print("\n tool_qty_array: "); print_r($tool_qty_array);

    $query_proj = "INSERT INTO `projects` SET
        `project_name` = '$proj_name',
        `project_description` = '$proj_descrip',
        `tool_count` = '$tool_count',
        `is_featured` = '$is_featured' ";
//,     `project_photo` = '$main_photo' ";

    print("\n" . $query_proj . "\n");
    $result_proj = mysqli_query($conn, $query_proj);    // Insert action

    if (mysqli_affected_rows($conn) > 0) {      // Get project_id of newly inserted project = $id
        $id = mysqli_insert_id($conn);
        print("Project ID: " . $id . "\n");
    } else {
        print("\n Failure \n");
    }


    // INSERT (2 of 4) INTO "P_INSTRUCTIONS" TABLE ***************************************************
    for ($i = 1; $i <= count($steps_array); $i++) {
        $stp_num = $i;
        $stp_txt = addslashes($steps_array[$i]["text_fields"]["stp_txt"]);
//        print($stp_num . $stp_txt);

        $query_p_instructions = "INSERT INTO `p_instructions`   
            (`project_id`, `step_number`, `step_text`)
        VALUES 
            ($id, $stp_num, '$stp_txt') ";

        print("\n".$query_p_instructions);
        $result_p_instructions = mysqli_query($conn, $query_p_instructions);    // insert action
    }


    // INSERT (3 of 4) INTO "TOOLS" TABLE ***************************************************
        /* "implode" makes a single string out of array elements separated by whatever is in double quotes */
    $string_of_tools1 =  "'" . implode("'), ('", $tool_array). "'";
        print("\n string of tools1: " . $string_of_tools1 . "\n");

        /* IGNORE together with "tool_name" being set to "UNIQUE" in mySQL does not allow for duplicate tools */
    $query_tools = "INSERT IGNORE INTO `tools` 
            (`tool_name`) 
        VALUES 
            ($string_of_tools1) ";

//    print("\n $query_tools:");   print("\n" . $query_tools . "\n");
    $result_tools = mysqli_query($conn, $query_tools);  // Insert action


    // INSERT (4 of 4) INTO "MAP_TP" TABLE ***************************************************
        /* Get the tool IDs of the project tools */
    $string_of_tools2 =  "'" . implode("', '", $tool_array). "'";
    $query = "SELECT `tool_id` FROM `tools` WHERE tool_name IN ($string_of_tools2) ORDER BY `tool_id` ASC";
    $result = mysqli_query($conn, $query);    // select action

        /* Put the tool IDs into an array; $tool_id_arr will contain an array within it, since $row is an associative array */
    $tool_id_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tool_id_arr[] = $row;
    }

//    print("\n Tool ID array: \n");    print_r($tool_id_arr);
    for ($i = 0; $i < count($tool_id_arr); $i++) {
        /* 3 values per row, where $id aka project ID, is constant */
        $output[] = "(". $id . ", " . $tool_id_arr[$i]['tool_id'] . ", " . $tool_qty_array[$i + 1] . ")" ;
    }

    $string_of_map_tp_inputs = implode(", ", $output);
    print("\n string of map_tp inputs: " . $string_of_map_tp_inputs);

    $query_map_tp = "INSERT INTO `map_tp` 
            (`project_id`, `tool_id`, `tool_qty`) 
        VALUES 
            $string_of_map_tp_inputs ";
//    print("\n $query_map_tp:");     print_r("\n".$query_map_tp);
    $result = mysqli_query($conn, $query_map_tp);    // Insert action
?>