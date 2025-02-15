<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function is_prime($num){
        if($num <=1){
            return false;
        }elseif($num ==2){
            return true;
        }
        elseif($num % 2 == 0){
            return false;
        } else{
            $sqrt_num = sqrt($num);
            $i =3;
            while($i <= $sqrt_num){
                if($num % $i == 0){
                    return false;
                }
                $i += 2;
            }
            return true;
        }
    }
    $number=3;
    if(is_prime($number)){
        echo "$number is a prime number";
    }else{
        echo "$number is not a prime number";
    }
    ?>
</body>
</html>