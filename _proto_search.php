<?php
require('./db/mysql_connect.php');

//get a list of tools by category, sorted by popularity
$tools_popular = "
SELECT t.tool_name, COUNT(*) AS `count`
FROM `map_tp` AS `map`
JOIN `tools` AS `t`
	ON t.tool_id = map.tool_id
WHERE map.project_category = 'art'    
GROUP BY t.tool_name
ORDER BY `count` DESC
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
            $('button').click(search);
            $('input[type=checkbox]').click(addItem);
        });

        function search() {
            $.ajax({
                url: '_proto_search_results.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    search: $('input[name=search]').val()
                },
                success: function(response) {
                    console.log(response);
                    var tbody = $('#results');
                    tbody.html('');
                    for (var i = 0; i < response.length; i++) {
                        var tr = $('<tr>');
                        tr.append( $('<td>').text(response[i].project) );

                        var score = parseFloat(response[i].score) * 100;
                        tr.append( $('<td>').text(score + "%") );

                        tr.append( $('<td>').text(response[i].ownCount + " of " + response[i].reqCount) );

                        var photo = $('<img>').attr('src', './db/photos/' + response[i].project_photo);
                        photo.css({'height': '200px'});

                        var link = $('<a>').attr('href', '_proto_project.php?pid=' + response[i].project_id);
                        link.append(photo);

                        tr.append( $('<td>').html(link) );
                        tbody.append(tr);
                    }
                }
            });
        }
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
                checkbox.val(materials[i].tool_name);
                checkbox.attr('id', materials[i].tool_name);
                var label = $('<label>').text(materials[i].tool_name);
                label.attr('for', materials[i].tool_name);
                var li = $('<li>').append(checkbox, label);
                list.append(li);
            }
        };

        function addItem() {
            var item = $(this).val();
            var search = $('input[name=search]');
            if (search.val() === "") {
                search.val(search.val() + '"' + item + '"');
            } else {
                search.val(search.val() + ', "' + item + '"');
            }

        }
    </script>
</head>
<body>

<input type="search" placeholder="search" name="search">
<button type="button">Submit</button>

<div id="materials_panel">
    <ul id="materials">

    </ul>
</div>

<table>
        <thead>
        <tr>
            <th>Project</th>
            <th>Relevance</th>
            <th>Materials</th>
            <th>Image</th>
        </tr>
        </thead>
    <tbody id="results">

    </tbody>
</table>
</body>
</html>