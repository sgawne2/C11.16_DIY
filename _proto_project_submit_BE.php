<?php
require('./db/mysql_connect.php');

$projectName = "test";
$toolCount = "2";
$photo = "photo";
$uid = 88;

//$query = "INSERT INTO `projects`
//SET
//  `Name` = '$projectName',
//  `toolCount` = $toolCount,
//  `photo` = '$photo',
//  `AuthorID` = $uid
//";

//insert new tools loop
$query = "INSERT IGNORE INTO `tools`
    (`Name`)
  VALUES
    ('new 1'),
    ('old'),
    ('old 2'),
    ('old 3'),
    ('old 4'),
    ('new 2')
";

$result = mysqli_query($conn, $query);
$rows = mysqli_affected_rows($conn);
$pid = [];

for ($i = 0; $i < count($row); $i++) {
    $pid[] = $i;
}

print($rows);
print("<br>");
print_r($pid);

//
//$toolNames = [
//    "hammer",
//    "screwdriver"
//];
//
//implode($toolNames);
//

//
////insert map rows loop
//$query = "INSERT INTO `tools_projectsmap`
//    (`toolsId`), (`projectID`), (`category`)
//  VALUES
//  `toolsID` = $tid,
//  `projectID` = $pid,
//  `category` = $category
//";
//
////insert steps loop
//$query = "INSERT INTO `projectinstructions`
//SET
//  `projectID` = $pid,
//  `step` = $stepNo,
//  `stepText` = $stepDesc,
//  `photo` = $stepPhoto
//";
?>