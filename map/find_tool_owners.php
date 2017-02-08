<?php
    require('../db/mysql_connect.php');

    /* following line is to make $_POST as php expects when using $http (angular way of AJAX) -VL */
//    $_POST = json_decode(file_get_contents('php://input'), true);

    $tool_name = addslashes( $_POST["tool_name"] );
//    print("tool name: " . $tool_name);

    if ($tool_name === "") {
        print("Tool name is blank.  Not selecting.");
    } else {
        /* Join 3 tables together and get data from each */
        $query = "
            SELECT u.user_name, u.street_address, u.city, u.zip_code, u.state, t.tool_name, m.tool_description 
            FROM map_tu AS m
            JOIN users AS u ON m.user_id = u.user_id
            JOIN tools AS t ON m.tool_id = t.tool_id
            WHERE t.tool_name = '$tool_name'
                " ;

        $output = [];

        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $output[] = $row;
            }
        }
    }

    $output_json = json_encode($output);
    echo ($output_json);
?>

<html>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Street Address</th>
                    <th>City</th>
                    <th>Zip Code</th>
                    <th>State</th>
                    <th>Tool Name</th>
                    <th>Tool Description</th>
                </tr>
            </thead>
            <tr>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> </td>
                <td> <?php print($output[0]["tool_name"]); ?> </td>
                <td> <?php print($output[0]["tool_description"]); ?> </td>
            </tr>
            <?php
            foreach ($output as $key => $value) {
                ?>
                <tr>
                    <td> <?php print($value["user_name"]); ?> </td>
                    <td> <?php print($value["street_address"]); ?> </td>
                    <td> <?php print($value["city"]); ?> </td>
                    <td> <?php print($value["zip_code"]); ?> </td>
                    <td> <?php print($value["state"]); ?> </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
