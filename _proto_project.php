<?php
require('./db/mysql_connect.php');
$pid = $_GET['pid'];
//get the tools for a specific project id
$tools_pid = "
SELECT p.project_id, p.project_name AS `project`, t.tool_name AS `tool`, p.project_photo AS `photo`
FROM `map_tp` AS `map`
JOIN `projects` AS `p`
	ON p.project_id = map.project_id
JOIN `tools` AS `t`
	ON t.tool_id = map.tool_id
WHERE p.project_id = " . $pid;

//get the steps for a specific project id
$steps_pid = "
SELECT p.project_name, i.step_number, i.step_text
FROM `p_instructions` AS `i`
JOIN `projects` AS `p`
	ON i.project_id = p.project_id
WHERE p.project_id = " . $pid;

$query = $steps_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    $steps = $output;
}

$query = $tools_pid;
$result = mysqli_query($conn, $query);
if( mysqli_num_rows($result) ) {
    $output = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $output[] = $row;
    }
    $tools = $output;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        img {
            height: 200px;
        }
    </style>
</head>
<body>
<?php
print("<img src='db/photos/". $tools[0]['photo'] ."'>'");
print('<br>');
print("tools: ");
print('<br>');
for ($i = 0; $i < count($tools); $i++) {
    print($tools[$i]['tool']);
    print('<br>');
}
print("steps: ");
print('<br>');
for ($i = 0; $i < count($steps); $i++) {
    print($steps[$i]['step_number'] . ": " . $steps[$i]['step_text']);
    print('<br>');
}
?>

</body>
</html>
