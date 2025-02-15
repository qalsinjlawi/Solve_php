<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo 'welcome php';
echo '<br />' ;
echo '<br />' ;



$colors =array("red", "green", "blue"); 



 echo "<ul>" ;

foreach ($colors as $color) {
    echo "<li>$color</li>";
}



 echo"</ul>" ;


?>
</body>
</html>