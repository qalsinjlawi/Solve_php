<?php
// الاتصال بقاعدة البيانات باستخدام PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // التأكد من وجود قيمة id في الرابط
    if (isset($_GET['id'])) {
        // استلام معرّف الطالب من الرابط
        $student_id = $_GET['id'];

        // استعلام لحذف الطالب بشكل ناعم
        $sql = "UPDATE Students SET deleted_at = CURRENT_TIMESTAMP WHERE student_id = :student_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();

        echo "تم حذف الطالب بنجاح.";
    } else {
        echo "لا يوجد معرّف للطالب.";
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
