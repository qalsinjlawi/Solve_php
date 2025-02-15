<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $arr = array(2, 4, 7, 4, 8, 4);

        echo join(', ', array_unique($arr));
    ?>
</body>
</html>