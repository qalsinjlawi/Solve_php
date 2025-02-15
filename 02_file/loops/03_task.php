<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<pre>
    <?php
    $n = 5;

    for ($i = 1; $i <= $n; $i++) {
        echo str_repeat(" ", $n - $i);
        for ($j = 1; $j <= $i; $j++) {
            echo chr(64 + $j) . " ";
        }
        echo "<br>";
    }

    for ($i = $n - 1; $i >= 1; $i--) {
        echo str_repeat(' ', $n - $i);
        for ($j = 1; $j <= $i; $j++) {
            echo chr(64 + $j) . ' ';
        }
        echo "<br>";
    }
    ?>
</pre>
</body>
</html>