<?php
require('./db/mysql_connect.php');

$search = $_POST['search'];

//get a list of projects from a list of tools and sort by ratio of tools owned over tools required
$search_by_tool = "
SELECT 
  p.ID, p.name AS `project`, 
  p.photo,
  GROUP_CONCAT(t.name SEPARATOR ', ') AS `owned_tools`, 
  COUNT(t.ID) AS `ownCount`, 
  p.toolCount AS `reqCount`, 
  COUNT(t.ID) / p.toolCount AS `score`
FROM `tools_projectsmap` AS `map`
JOIN `projects` AS `p`
	ON p.ID = map.projectID
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
WHERE t.name IN (".$search.")
GROUP BY p.ID
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