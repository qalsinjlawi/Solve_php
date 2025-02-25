<?php
// الاتصال بقاعدة البيانات باستخدام PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // التحقق من وجود متغير id في الرابط
    if (isset($_GET['id'])) {
        $student_id = $_GET['id'];

        // استعلام لاسترجاع بيانات الطالب بناءً على ID
        $sql = "SELECT * FROM Students WHERE student_id = :student_id AND deleted_at IS NULL";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();

        $student = $stmt->fetch();

        if (!$student) {
            echo "<div class='error-message'>الطالب غير موجود أو تم حذفه.</div>";
            exit;
        }
    } else {
        echo "<div class='error-message'>معرف الطالب غير موجود.</div>";
        exit;
    }
} catch(PDOException $e) {
    echo "<div class='error-message'>Error: " . $e->getMessage() . "</div>";
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحديث بيانات الطالب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .submit-btn {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        .error-message {
            color: red;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>تحديث بيانات الطالب</h2>
    <form action="update_student_action.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">

        <label for="first_name">الاسم الأول:</label>
        <input type="text" name="first_name" value="<?php echo $student['first_name']; ?>" required>

        <label for="last_name">الاسم الأخير:</label>
        <input type="text" name="last_name" value="<?php echo $student['last_name']; ?>" required>

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>

        <label for="date_of_birth">تاريخ الميلاد:</label>
        <input type="date" name="date_of_birth" value="<?php echo $student['date_of_birth']; ?>" required>

        <label for="gender">الجنس:</label>
        <select name="gender" required>
            <option value="Male" <?php if ($student['gender'] == 'Male') echo 'selected'; ?>>ذكر</option>
            <option value="Female" <?php if ($student['gender'] == 'Female') echo 'selected'; ?>>أنثى</option>
            <option value="Other" <?php if ($student['gender'] == 'Other') echo 'selected'; ?>>آخر</option>
        </select>

        <label for="major">التخصص:</label>
        <input type="text" name="major" value="<?php echo $student['major']; ?>">

        <label for="enrollment_year">سنة التسجيل:</label>
        <input type="number" name="enrollment_year" value="<?php echo $student['enrollment_year']; ?>" required>

        <input type="submit" value="تحديث" class="submit-btn">
    </form>
</div>

</body>
</html>
