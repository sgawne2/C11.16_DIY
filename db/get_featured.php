<?php
require('mysql_connect.php');

$_POST = json_decode(file_get_contents('php://input'), true);

//get a list of projects from a list of tools and sort by ratio of tools owned over tools required
$search_by_tool = "
SELECT 
  p.project_id, p.project_name, 
  p.project_photo, p.project_description
FROM `projects` AS `p`
WHERE p.is_featured = 1
";

$query = $search_by_tool;
$result = mysqli_query($conn, $query);

if($result) {
    if (mysqli_num_rows($result)) {
        $output = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $output[] = $row;
        }
        echo json_encode($output);
    }
}

?>