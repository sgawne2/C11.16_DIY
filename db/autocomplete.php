<?php
require('mysql_connect.php');

$query = "
SELECT `tool_name` AS `name`
FROM `tools`
";

$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>