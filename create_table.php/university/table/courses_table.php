<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    // إنشاء الاتصال باستخدام PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تعيين وضع الخطأ في PDO لرفع الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // استعلام SQL لإنشاء الجدول
    $sql = "CREATE TABLE IF NOT EXISTS Courses (
        course_id INT AUTO_INCREMENT PRIMARY KEY,
        course_name VARCHAR(100) NOT NULL,
        course_code VARCHAR(50) UNIQUE NOT NULL,
        credits INT NOT NULL,
        department VARCHAR(100) NOT NULL
    )";

    // تنفيذ الاستعلام
    $conn->exec($sql);
    echo "Table 'Courses' created successfully";

} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}

// إغلاق الاتصال
$conn = null;
?>
