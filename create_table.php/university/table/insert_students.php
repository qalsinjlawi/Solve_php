<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

// إنشاء الاتصال باستخدام PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تعيين وضع الخطأ إلى الاستثناءات
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>"; 
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// 1. إدخال المواد الدراسية
$sql_courses = "INSERT IGNORE INTO Courses (course_name, course_code, credits, department)
        VALUES 
        ('Introduction to Computer Science', 'CS101', 3, 'Computer Science'),
        ('Linear Algebra', 'MATH101', 3, 'Mathematics'),
        ('Classical Mechanics', 'PHYS101', 4, 'Physics')";

try {
    $conn->exec($sql_courses); // تنفيذ الاستعلام
    echo "New courses created successfully or already exists<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// 2. إدخال الطلاب
$sql_students = "INSERT IGNORE INTO Students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year)
        VALUES
        ('John', 'Doe', 'john.doe@example.com', '2000-01-15', 'Male', 'Computer Science', 2022),
        ('Jane', 'Smith', 'jane.smith@example.com', '2001-05-20', 'Female', 'Mathematics', 2021),
        ('Alex', 'Johnson', 'alex.johnson@example.com', '2000-11-25', 'Male', 'Physics', 2023)";

try {
    $conn->exec($sql_students); // تنفيذ الاستعلام
    echo "New students created successfully or already exists<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// إغلاق الاتصال
$conn = null;
?>
