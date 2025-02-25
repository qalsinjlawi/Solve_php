<?php
// استدعاء الاتصال بقاعدة البيانات
require_once 'database.php'; // تأكد من أن هذا الملف موجود

// استعلام لعرض البيانات من جدول students
$sql = "SELECT * FROM students ORDER BY student_id ASC"; // ترتيب البيانات تصاعدياً حسب student_id

try {
    // تنفيذ الاستعلام
    $stmt = $pdo->query($sql);

    // جلب البيانات
    $students = $stmt->fetchAll();

    // التحقق إذا كانت هناك بيانات لعرضها
    if ($students) {
        echo "<h1> قائمة الطلاب</h1>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>الاسم الأول</th><th>الاسم الأخير</th><th>البريد الإلكتروني</th><th>تاريخ الميلاد</th><th>الجنس</th><th>التخصص</th><th>سنة التسجيل</th></tr>";

        // عرض البيانات في جدول
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student['student_id'] . "</td>";
            echo "<td>" . $student['first_name'] . "</td>";
            echo "<td>" . $student['last_name'] . "</td>";
            echo "<td>" . $student['email'] . "</td>";
            echo "<td>" . $student['date_of_birth'] . "</td>";
            echo "<td>" . $student['gender'] . "</td>";
            echo "<td>" . $student['major'] . "</td>";
            echo "<td>" . $student['enrollment_year'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "لا توجد بيانات لعرضها.";
    }
} catch (PDOException $e) {
    echo "❌ حدث خطأ أثناء عرض البيانات: " . $e->getMessage();
}
?>
