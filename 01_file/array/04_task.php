<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $arr = array('1','2','3','4','5');
    $location = 3;
    $item ="$";
    array_splice($arr ,$location,0,$item);
    echo implode("",$arr);

    ?>
    
</body>
</html>