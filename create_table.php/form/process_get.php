<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // استلام البيانات من النموذج
    $name = $_GET['name'];
    $email = $_GET['email'];

    // التحقق من صحة البيانات
    if (empty($name)) {
        echo "الاسم مطلوب!";
    } else {
        echo "الاسم: $name<br>";
    }

    // التحقق من أن البريد الإلكتروني صالح
    if (empty($email)) {
        echo "البريد الإلكتروني مطلوب!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "البريد الإلكتروني غير صالح!";
    } else {
        echo "البريد الإلكتروني: $email";
    }
}
?>
