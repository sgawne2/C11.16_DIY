<?php
require('./db/mysql_connect.php');

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

//get a list of tools by category, sorted by popularity
$tools_popular = "
SELECT t.name, COUNT(*) AS `count`
FROM `tools_projectsmap` AS `map`
JOIN `tools` AS `t`
	ON t.ID = map.toolsID
WHERE t.category = 'art'    
GROUP BY t.name
ORDER BY `count` DESC
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

$query = $tools_popular;
$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        $(document).ready(function(){
           populate_materials();
        });

//        var materials = [
//                "hammer",
//                "rubber mallet",
//                "tape measure",
//                "level",
//                "nail gun",
//                "glue gun",
//                "phillips head screwdriver",
//                "adjustable wrench",
//                "tape"
//        ];

        var materials = <?php
                if( mysqli_num_rows($result) ) {
                    $output = [];
                    while( $row = mysqli_fetch_assoc($result) ) {
                        $output[] = $row;
                    }
                    echo json_encode($output);
                }
                ?>

        function populate_materials() {
            var list = $('#materials');
            for(var i = 0; i < materials.length; i++) {
                var checkbox = $('<input>').attr('type', 'checkbox');
                checkbox.val(materials[i].name);
                checkbox.attr('id', materials[i].name);
                var label = $('<label>').text(materials[i].name);
                label.attr('for', materials[i].name);
                var li = $('<li>').append(checkbox, label);
                list.append(li);
            }
        }

    </script>
</head>
<body>

<input type="search">

<div id="materials_panel">
    <ul id="materials">

    </ul>
</div>
</body>
</html>