<?php
// بيانات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

try {
    // إنشاء الاتصال باستخدام PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تعيين وضع الخطأ في PDO لرفع الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. إدخال الطلاب (10 طلاب)
    $students = [
        ['John', 'Doe', 'john.doe@example.com', '2000-01-15', 'Male', 'Computer Science', 2020],
        ['Jane', 'Smith', 'jane.smith@example.com', '1999-05-22', 'Female', 'Mathematics', 2019],
        ['Alex', 'Johnson', 'alex.johnson@example.com', '2001-03-10', 'Male', 'Physics', 2021],
        ['Emma', 'Brown', 'emma.brown@example.com', '1998-07-30', 'Female', 'Computer Science', 2018],
        ['Chris', 'Taylor', 'chris.taylor@example.com', '1997-11-20', 'Male', 'Engineering', 2017],
        ['Olivia', 'Williams', 'olivia.williams@example.com', '2000-02-05', 'Female', 'Biology', 2020],
        ['James', 'Miller', 'james.miller@example.com', '2001-01-25', 'Male', 'Physics', 2021],
        ['Sophia', 'Davis', 'sophia.davis@example.com', '1999-09-18', 'Female', 'Mathematics', 2019],
        ['Michael', 'Martinez', 'michael.martinez@example.com', '2000-06-12', 'Male', 'Engineering', 2020],
        ['Amelia', 'Garcia', 'amelia.garcia@example.com', '2000-10-30', 'Female', 'Computer Science', 2020]
    ];

    foreach ($students as $student) {
        $email = $student[2];
        $sql_check = "SELECT COUNT(*) FROM Students WHERE email = :email";
        $stmt = $conn->prepare($sql_check);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetchColumn();

        if ($row == 0) {
            $sql = "INSERT INTO Students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year)
                    VALUES (:first_name, :last_name, :email, :date_of_birth, :gender, :major, :enrollment_year)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':first_name', $student[0]);
            $stmt->bindParam(':last_name', $student[1]);
            $stmt->bindParam(':email', $student[2]);
            $stmt->bindParam(':date_of_birth', $student[3]);
            $stmt->bindParam(':gender', $student[4]);
            $stmt->bindParam(':major', $student[5]);
            $stmt->bindParam(':enrollment_year', $student[6]);
            $stmt->execute();
        } else {
            echo "Email {$email} already exists. Skipping insertion for this student.<br>";
        }
    }

    // 2. إدخال المدربين (5 مدربين)
    $instructors = [
        ['Dr. Michael', 'Scott', 'michael.scott@example.com', '2015-08-01', 'Management'],
        ['Dr. Jim', 'Halpert', 'jim.halpert@example.com', '2013-09-15', 'Computer Science'],
        ['Dr. Pam', 'Beesly', 'pam.beesly@example.com', '2014-06-20', 'Psychology'],
        ['Dr. Dwight', 'Schrute', 'dwight.schrute@example.com', '2012-03-05', 'Agriculture'],
        ['Dr. Angela', 'Martin', 'angela.martin@example.com', '2011-11-10', 'Accounting']
    ];

    foreach ($instructors as $instructor) {
        $email = $instructor[2];
        $sql_check = "SELECT COUNT(*) FROM Instructors WHERE email = :email";
        $stmt = $conn->prepare($sql_check);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetchColumn();

        if ($row == 0) {
            $sql = "INSERT INTO Instructors (first_name, last_name, email, hire_date, department)
                    VALUES (:first_name, :last_name, :email, :hire_date, :department)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':first_name', $instructor[0]);
            $stmt->bindParam(':last_name', $instructor[1]);
            $stmt->bindParam(':email', $instructor[2]);
            $stmt->bindParam(':hire_date', $instructor[3]);
            $stmt->bindParam(':department', $instructor[4]);
            $stmt->execute();
        } else {
            echo "Email {$email} already exists. Skipping insertion for this instructor.<br>";
        }
    }

    // 3. إدخال الدورات (5 دورات)
    $courses = [
        ['Introduction to Computer Science', 'CS101', 3, 'Computer Science'],
        ['Linear Algebra', 'MATH101', 3, 'Mathematics'],
        ['Classical Mechanics', 'PHYS101', 4, 'Physics'],
        ['Financial Accounting', 'ACC101', 3, 'Accounting'],
        ['Organic Chemistry', 'CHEM101', 3, 'Chemistry']
    ];

    foreach ($courses as $course) {
        $course_code = $course[1];
        $sql_check = "SELECT COUNT(*) FROM Courses WHERE course_code = :course_code";
        $stmt = $conn->prepare($sql_check);
        $stmt->bindParam(':course_code', $course_code);
        $stmt->execute();
        $row = $stmt->fetchColumn();

        if ($row == 0) {
            $sql = "INSERT INTO Courses (course_name, course_code, credits, department)
                    VALUES (:course_name, :course_code, :credits, :department)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':course_name', $course[0]);
            $stmt->bindParam(':course_code', $course[1]);
            $stmt->bindParam(':credits', $course[2]);
            $stmt->bindParam(':department', $course[3]);
            $stmt->execute();
        } else {
            echo "Course code {$course_code} already exists. Skipping insertion for this course.<br>";
        }
    }

    // 4. تعيين الدورات للمدربين
    $assignments = [
        [1, 1, 'Fall', 2025],
        [2, 2, 'Spring', 2025],
        [3, 3, 'Fall', 2025],
        [4, 4, 'Spring', 2025],
        [5, 5, 'Fall', 2025]
    ];

    foreach ($assignments as $assignment) {
        $course_id = $assignment[1];
        $sql_check_course = "SELECT COUNT(*) FROM Courses WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql_check_course);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        $row_course = $stmt->fetchColumn();

        if ($row_course > 0) {
            $sql = "INSERT INTO Course_Assignments (instructor_id, course_id, semester, year)
                    VALUES (:instructor_id, :course_id, :semester, :year)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':instructor_id', $assignment[0]);
            $stmt->bindParam(':course_id', $assignment[1]);
            $stmt->bindParam(':semester', $assignment[2]);
            $stmt->bindParam(':year', $assignment[3]);
            $stmt->execute();
        } else {
            echo "Course with ID {$course_id} does not exist. Skipping assignment.<br>";
        }
    }

    // 5. تسجيل الطلاب في الدورات
    $enrollments = [
        [1, 1, 'A'], [1, 2, 'B'],
        [2, 3, 'A'], [2, 4, 'B'],
        [3, 5, 'C'], [3, 1, 'B'],
        [4, 2, 'B'], [4, 3, 'A'],
        [5, 4, 'B'], [5, 5, 'C'],
        [6, 1, 'A'], [6, 2, 'A'],
        [7, 3, 'B'], [7, 4, 'C'],
        [8, 5, 'A'], [8, 1, 'B'],
        [9, 2, 'C'], [9, 3, 'B'],
        [10, 4, 'A'], [10, 5, 'C']
    ];

    foreach ($enrollments as $enrollment) {
        $course_id = $enrollment[1];
        $sql_check_course = "SELECT COUNT(*) FROM Courses WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql_check_course);
        $stmt->bindParam(':course_id', $course_id);
        $stmt->execute();
        $row_course = $stmt->fetchColumn();

        if ($row_course > 0) {
            $sql = "INSERT INTO Enrollments (student_id, course_id, grade)
                    VALUES (:student_id, :course_id, :grade)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':student_id', $enrollment[0]);
            $stmt->bindParam(':course_id', $enrollment[1]);
            $stmt->bindParam(':grade', $enrollment[2]);
            $stmt->execute();
        } else {
            echo "Course with ID {$course_id} does not exist. Skipping enrollment.<br>";
        }
    }

    echo "Data inserted successfully.";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// إغلاق الاتصال
$conn = null;
?>
