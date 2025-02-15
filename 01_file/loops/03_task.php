<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            if ($i == 1) {
                echo " A ";
            } elseif ($i == 2) {
                echo ($j <= 3) ? " A " : " B ";
            } elseif ($i == 3) {
                echo ($j <= 2) ? " A " : " C ";
            } elseif ($i == 4) {
                echo ($j == 1) ? " A " : " D ";
            } elseif ($i == 5) {
                echo " E ";
            };
        }
       echo "<br>";
    }
    ?>
</body>
</html>