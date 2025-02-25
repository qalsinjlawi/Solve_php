<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";  // اسم المستخدم في XAMPP هو عادةً "root"
$password = "";      // كلمة المرور في XAMPP عادةً تكون فارغة
$dbname = "UniversityDB";  // اسم قاعدة البيانات التي أنشأتها

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// الكود لإنشاء جدول الطلاب
$sql = "CREATE TABLE Students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    major VARCHAR(100),
    enrollment_year YEAR NOT NULL
)";

// تنفيذ الكود
if ($conn->query($sql) === TRUE) {
    echo "Table 'Students' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// إغلاق الاتصال
$conn->close();
?>
