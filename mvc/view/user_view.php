<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معلومات المستخدم</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- رابط ملف الـ CSS -->
</head>
<body>
    <h1>معلومات المستخدم</h1>

    <table>
        <tr>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
        </tr>
        <tr>
            <td><?= $userData['name'] ?></td>
            <td><?= $userData['email'] ?></td>
        </tr>
    </table>
</body>
</html>
