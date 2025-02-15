<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str = "remove";
    function reverse_string($str){
       $arr = str_split($str);
       $reversedarray = array_reverse($arr);
       echo join("",$reversedarray);
    }
    reverse_string($str);
    ?>
</body>
</html>