<?php
// الاتصال بقاعدة البيانات باستخدام PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // استعلام لاسترجاع جميع الطلاب
    $sql = "SELECT * FROM Students WHERE deleted_at IS NULL";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $students = $stmt->fetchAll();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض الطلاب</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #45a049;
            color: white;
        }

        .actions {
            display: flex;
            justify-content: space-around;
        }

        .actions a {
            margin: 0 5px;
        }
    </style>
</head>
<body>

    <h2>قائمة الطلاب</h2>

    <!-- عرض الطلاب في جدول -->
    <table>
        <thead>
            <tr>
                <th>الاسم الأول</th>
                <th>الاسم الأخير</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ الميلاد</th>
                <th>الجنس</th>
                <th>التخصص</th>
                <th>التسجيل</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?php echo $student['first_name']; ?></td>
                <td><?php echo $student['last_name']; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['date_of_birth']; ?></td>
                <td><?php echo $student['gender']; ?></td>
                <td><?php echo $student['major']; ?></td>
                <td><?php echo $student['enrollment_year']; ?></td>
                <td class="actions">
                    <a href="update_student.php?id=<?php echo $student['student_id']; ?>">تحديث</a> | 
                    <a href="delete_student.php?id=<?php echo $student['student_id']; ?>" onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">حذف</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
