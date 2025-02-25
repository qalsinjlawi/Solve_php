<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST['student_id']) || empty($_POST['student_id'])) {
            die("معرف الطالب غير موجود.");
        }

        $student_id = $_POST['student_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $date_of_birth = $_POST['date_of_birth'];
        $gender = $_POST['gender'];
        $major = $_POST['major'];
        $enrollment_year = $_POST['enrollment_year'];

        $sql = "UPDATE Students SET
                    first_name = :first_name,
                    last_name = :last_name,
                    email = :email,
                    date_of_birth = :date_of_birth,
                    gender = :gender,
                    major = :major,
                    enrollment_year = :enrollment_year,
                    updated_at = CURRENT_TIMESTAMP
                WHERE student_id = :student_id AND deleted_at IS NULL";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date_of_birth', $date_of_birth);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':major', $major);
        $stmt->bindParam(':enrollment_year', $enrollment_year);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();

        // الصفحة التي سيتم التوجيه إليها بعد النجاح
        $redirect_page = "students_list.php";

        // عرض رسالة نجاح مؤقتة ثم إعادة التوجيه تلقائيًا
        echo "
        <html lang='ar'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>نجاح التحديث</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .message-container {
                    background-color: white;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    width: 400px;
                }
                .success-message {
                    font-size: 18px;
                    color: green;
                    font-weight: bold;
                }
            </style>
        </head>
        <body>
            <div class='message-container'>
                <p class='success-message'>✅ تم تحديث بيانات الطالب بنجاح!</p>
            </div>
            <script>
                setTimeout(() => {
                    window.location.href = '$redirect_page';
                }, 1500); // الرجوع تلقائيًا بعد 3 ثوانٍ
            </script>
        </body>
        </html>";
        exit;
    }
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
