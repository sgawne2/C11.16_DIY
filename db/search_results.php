<?php
require('mysql_connect.php');

$_POST = json_decode(file_get_contents('php://input'), true);

$search = $_POST['search'];
//print($_GET['search']);

//get a list of projects from a list of tools and sort by ratio of tools owned over tools required
$search_by_tool = "
SELECT 
  p.project_id, p.project_name, 
  p.project_photo, p.project_description,
  GROUP_CONCAT(t.tool_name SEPARATOR ', ') AS `owned_tools`, 
  COUNT(t.tool_id) AS `own_count`, 
  p.tool_count AS `req_count`, 
  COUNT(t.tool_id) / p.tool_count AS `score`
FROM `map_tp` AS `map`
JOIN `projects` AS `p`
	ON p.project_id = map.project_id
JOIN `tools` AS `t`
	ON t.tool_id = map.tool_id
WHERE t.tool_name IN (".$search.")
GROUP BY p.project_id
ORDER BY `score` DESC
";

$query = $search_by_tool;
$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    echo json_encode($output);
}

?>