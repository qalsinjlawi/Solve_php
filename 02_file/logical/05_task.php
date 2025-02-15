<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n = 10;
    $min = 11;
    $max = 20;
    $numbers = range($min, $max);
    shuffle($numbers);
    foreach(array_slice($numbers, 0, $n) as $key){
        echo $key . " ";
    }
    ?>
</body>
</html>