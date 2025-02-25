<?php
// التحقق من أن البيانات أُرسلت عبر POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = $_POST['name'];
    $email = $_POST['email'];

    // طباعة البيانات على الصفحة
    echo "<h2>البيانات المدخلة:</h2>";
    echo "<p><strong>الاسم:</strong> $name</p>";
    echo "<p><strong>البريد الإلكتروني:</strong> $email</p>";
}
?>
