<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calculateElectricityBill($units) {
            $bill = 0;

            if ($units <= 50) {
                $bill = $units * 2.50;
            } elseif ($units <= 150) {
                $bill = $units * 5.00;
            } elseif ($units <= 250) {
                $bill = $units * 6.20;
            } else {
                $bill = $units * 7.50;
            }

            return $bill;
        }

        $units = 300;
        echo "The electricity bill for $units units is: " . calculateElectricityBill($units) . " JOD";
    ?>
</body>
</html>