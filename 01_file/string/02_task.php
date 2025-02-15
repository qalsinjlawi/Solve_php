<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str = "085119";
    $hours = substr($str, 0, 2);
    $minutes = substr($str, 2, 2);
    $seconds = substr($str, 4, 2);
    
    $time = $hours . ":" . $minutes . ":" . $seconds;
    
    echo $time;
    

    ?>
</body>
</html>