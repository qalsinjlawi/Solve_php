<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $text = "hello world!";
    $uppercase = strtoupper($text);
    echo $uppercase , "<br>"; 
    $lowercase = strtolower($text);
    echo $lowercase , "<br>" ; 
    $ucfirst = ucfirst($text);
    echo $ucfirst , "<br>" ;
    $titleCase = ucwords($text);
    echo $titleCase , "<br>" ;
    

    ?>
</body>
</html>