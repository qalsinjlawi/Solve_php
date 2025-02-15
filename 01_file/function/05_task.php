1  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $normal = "Eva, can I see bees in a cave?";
        
    $newText = strtolower(preg_replace("/[^a-zA-Z]/", '', $normal));
    $reversedString = join(array_reverse(str_split($newText)));

    echo ($reversedString === $newText) ? "Yes it is a palindrome" : "No it's not a palindrome";
?>
    
</body>
</html>