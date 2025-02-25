<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    // إنشاء الاتصال باستخدام PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تعيين وضع الخطأ إلى الاستثناءات
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // إنشاء جدول Students إذا لم يكن موجوداً
    $sql = "CREATE TABLE IF NOT EXISTS Students (
        student_id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        date_of_birth DATE NOT NULL,
        gender ENUM('Male', 'Female', 'Other') NOT NULL,
        major VARCHAR(100),
        enrollment_year YEAR NOT NULL
    )";

    // تنفيذ الاستعلام
    $conn->exec($sql);
    echo "Table 'Students' created successfully or already exists<br>";

    // إضافة التحقق من وجود student_id في جدول Students
    $student_id = $enrollment[0]; // تأكد من أن متغير $enrollment يحتوي على بيانات
    $sql_check_student = "SELECT COUNT(*) FROM Students WHERE student_id = :student_id";
    $stmt = $conn->prepare($sql_check_student);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();
    $row_student = $stmt->fetchColumn();

    if ($row_student > 0) {
        // التحقق من وجود course_id في جدول Courses
        $course_id = $enrollment[1];
        $sql_check_course = "SELECT COUNT(*) FROM Courses WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql_check_course);
        $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $stmt->execute();
        $row_course = $stmt->fetchColumn();

        if ($row_course > 0) {
            // إذا كانت الطالب والدورة موجودين، قم بإدخال التسجيل
            $grade = $enrollment[2]; // تأكد من تحديد درجة الطالب
            $sql_insert_enrollment = "INSERT INTO Enrollments (student_id, course_id, grade)
                                      VALUES (:student_id, :course_id, :grade)";
            $stmt = $conn->prepare($sql_insert_enrollment);
            $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
            $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
            $stmt->bindParam(':grade', $grade, PDO::PARAM_STR);
            $stmt->execute();
            echo "Enrollment successful!<br>";
        } else {
            echo "Course with ID {$course_id} does not exist. Skipping enrollment.<br>";
        }
    } else {
        echo "Student with ID {$student_id} does not exist. Skipping enrollment.<br>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// إغلاق الاتصال
$conn = null;
?>

