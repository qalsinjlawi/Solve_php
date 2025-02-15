<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function fibonacciSeries($n){
        $num1 = 0;
        $num2 = 1;
      
          for ( $i = 0; $i < $n; $i++ ) {
            echo $num1 . ", ";
            $num3 = $num1 + $num2;
            $num1 = $num2;
            $num2 = $num3;
        }
        }
        $n = 10;
        fibonacciSeries($n);


    ?>

</body>
</html>