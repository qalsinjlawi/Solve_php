<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $total = 0;
    for ($x=0; $x < 30; $x++){ 
        $total += $x;
    };
    echo "The total sum of integers between 0 and 30 is =  $total";
    ?>
</body>
</html>