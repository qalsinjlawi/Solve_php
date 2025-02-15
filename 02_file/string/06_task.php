<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $str = "The quick brown fox jumps over the lazy dog";
        $arr = explode(" ", $str);
        $cuttedArray = array_slice($arr, 0, 5);
        $firstFiveWords = join(" ", $cuttedArray);
        echo $firstFiveWords;
    ?>
</body>
</html>