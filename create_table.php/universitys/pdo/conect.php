<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitys"; // تعديل اسم قاعدة البيانات

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ تم الاتصال بقاعدة البيانات بنجاح!";
} catch (PDOException $e) {
    echo "❌ فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
}
?>
