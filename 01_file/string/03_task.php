<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $str1 = 'I am a full stack developer at orange coding academy';
    if (strpos($str1,'Orange') !== false) 
    {
        echo 'Word Not Found!';
    }else{
        echo 'Word Found!';
    }

    ?>
</body>
</html>