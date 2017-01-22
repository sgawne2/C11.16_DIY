<?php
require('mysql_connect.php');

//get a list of every project
$projects_all = "
SELECT * 
FROM `projects`
";

//get the steps for a specific project id
$steps_pid = "
SELECT p.name, i.step, i.stepText 
FROM `projectinstructions` AS `i`
JOIN `projects` AS `p`
	ON i.projectID = p.ID
WHERE p.ID = 1
";

//get the projects with a specific tool id
$projects_tid = "
SELECT p.ID, p.name AS `project`, t.name AS `tool`
FROM `tools_projectsmap` AS `map`
JOIN `projects` AS `p`
	ON p.ID = map.projectID
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
WHERE t.ID = 1;
";

//get the tools for a specific project id
$tools_pid = "
SELECT p.ID, p.name AS `project`, t.name AS `tool`
FROM `tools_projectsmap` AS `map`
JOIN `projects` AS `p`
	ON p.ID = map.projectID
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
WHERE p.ID = 1;
";

//get a list of tools for every project
$tools_all = "
SELECT p.ID, p.name, GROUP_CONCAT(t.name SEPARATOR ', ') AS `tools`
FROM `tools_projectsmap` AS `map`
JOIN `projects` AS `p`
	ON p.ID = map.projectID
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
GROUP BY p.ID
";

//get a list of projects from a list of tools and sort by ratio of tools owned over tools required
$search_by_tid = "
SELECT 
  p.ID, p.name AS `project`, 
  GROUP_CONCAT(t.name SEPARATOR ', ') AS `owned_tools`, 
  COUNT(t.ID) AS `ownCount`, 
  p.toolCount AS `reqCount`, 
  COUNT(t.ID) / p.toolCount AS `score`
FROM `tools_projectsmap` AS `map`
JOIN `projects` AS `p`
	ON p.ID = map.projectID
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
WHERE t.ID IN (1, 2, 3, 4, 6, 7)
GROUP BY p.ID
ORDER BY `score` DESC
";

$query = $search_by_tid;
$result = mysqli_query($conn, $query);

if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    echo "<pre>";
    print_r($output);
    echo "</pre>";
}

?>