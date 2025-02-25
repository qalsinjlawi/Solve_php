<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 

try {
    // الاتصال بدون تحديد قاعدة بيانات لإنشاءها أولاً
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // إنشاء قاعدة البيانات إذا لم تكن موجودة
    $sql = "CREATE DATABASE IF NOT EXISTS University CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    $pdo->exec($sql);
    echo "✅ تم التأكد من وجود قاعدة البيانات أو إنشاؤها بنجاح!<br>";

    // الآن الاتصال بقاعدة البيانات الجديدة
    $dbname = "University";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "✅ تم الاتصال بقاعدة البيانات University بنجاح!";
} catch (PDOException $e) {
    die("❌ خطأ في الاتصال أو إنشاء قاعدة البيانات: " . $e->getMessage());
}
?>
