<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
        #1 insert 
        $str = "The brown fox";
        $words = explode(" ", $str);
        
        array_splice($words, 1, 0, "quick");
        
        $newStr = join(" ", $words);
        echo $newStr . "<br>";
        
        #2 get the first word
        $firstWordInString = substr($newStr, 0, strpos($newStr, ' '));
        echo $firstWordInString;
    ?>
</body>
</html>