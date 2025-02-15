<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $temperature=[78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 
    65, 64, 68, 73, 75, 79, 73 ];
    $unique_temps = array_unique($temperature);
    $average = array_sum($unique_temps)/count($unique_temps);
    

    sort($unique_temps);

    $lowest = array_slice($unique_temps,0,5);
    $highest= array_slice($unique_temps,-5);
    echo "Average Temperature is: ". round($average, 1) . "<br>";
    echo "List of seven lowest temperatures: ".implode(",",$lowest)."<br>";

    echo "List of seven hi temperatures: " .implode(",",$highest). "<br>";

    

    ?>
</body>
</html>