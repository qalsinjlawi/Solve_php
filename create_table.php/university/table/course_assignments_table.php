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
    $sql = "CREATE TABLE IF NOT EXISTS Course_Assignments (
        assignment_id INT AUTO_INCREMENT PRIMARY KEY,
        instructor_id INT,
        course_id INT,
        semester VARCHAR(50),
        year YEAR,
        FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id),
        FOREIGN KEY (course_id) REFERENCES Courses(course_id)
    )";

    // تنفيذ الاستعلام
    $conn->exec($sql);
    echo "Table 'Course_Assignments' created successfully";

} catch(PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}

// إغلاق الاتصال
$conn = null;
?>
