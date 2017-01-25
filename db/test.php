<?php
    $step1 = "frantic";
    $step2 = "oil";

    for ($j = 1; $j < 3; ++$j) {
        $step_number = "$"."step"."$j";
        print($step_number);
        $array[] = $step_number;
    }

    print_r($array);

/****************************************************************************/

    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

    foreach($age as $x => $x_value) {
        if ($x === "Joe") {
            break;
        } else {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }
    }
?>
