<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Insert students (10 students)
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
    $sql_check = "SELECT COUNT(*) FROM Students WHERE email = '$email'";
    $result = $conn->query($sql_check);
    $row = $result->fetch_row();

    if ($row[0] == 0) {
        $sql = "INSERT INTO Students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year)
                VALUES ('{$student[0]}', '{$student[1]}', '{$student[2]}', '{$student[3]}', '{$student[4]}', '{$student[5]}', {$student[6]})";
        $conn->query($sql);
    } else {
        echo "Email {$email} already exists. Skipping insertion for this student.<br>";
    }
}

// 2. Insert instructors (5 instructors)
$instructors = [
    ['Dr. Michael', 'Scott', 'michael.scott@example.com', '2015-08-01', 'Management'],
    ['Dr. Jim', 'Halpert', 'jim.halpert@example.com', '2013-09-15', 'Computer Science'],
    ['Dr. Pam', 'Beesly', 'pam.beesly@example.com', '2014-06-20', 'Psychology'],
    ['Dr. Dwight', 'Schrute', 'dwight.schrute@example.com', '2012-03-05', 'Agriculture'],
    ['Dr. Angela', 'Martin', 'angela.martin@example.com', '2011-11-10', 'Accounting']
];

foreach ($instructors as $instructor) {
    $email = $instructor[2];
    $sql_check = "SELECT COUNT(*) FROM Instructors WHERE email = '$email'";
    $result = $conn->query($sql_check);
    $row = $result->fetch_row();

    if ($row[0] == 0) {
        $sql = "INSERT INTO Instructors (first_name, last_name, email, hire_date, department)
                VALUES ('{$instructor[0]}', '{$instructor[1]}', '{$instructor[2]}', '{$instructor[3]}', '{$instructor[4]}')";
        $conn->query($sql);
    } else {
        echo "Email {$email} already exists. Skipping insertion for this instructor.<br>";
    }
}

// 3. Insert courses (5 courses)
$courses = [
    ['Introduction to Computer Science', 'CS101', 3, 'Computer Science'],
    ['Linear Algebra', 'MATH101', 3, 'Mathematics'],
    ['Classical Mechanics', 'PHYS101', 4, 'Physics'],
    ['Financial Accounting', 'ACC101', 3, 'Accounting'],
    ['Organic Chemistry', 'CHEM101', 3, 'Chemistry']
];

foreach ($courses as $course) {
    $course_code = $course[1];
    $sql_check = "SELECT COUNT(*) FROM Courses WHERE course_code = '$course_code'";
    $result = $conn->query($sql_check);
    $row = $result->fetch_row();

    if ($row[0] == 0) {
        $sql = "INSERT INTO Courses (course_name, course_code, credits, department)
                VALUES ('{$course[0]}', '{$course[1]}', {$course[2]}, '{$course[3]}')";
        $conn->query($sql);
    } else {
        echo "Course code {$course_code} already exists. Skipping insertion for this course.<br>";
    }
}


// 4. Assign courses to instructors (each instructor teaches one course)
$assignments = [
    [1, 1, 'Fall', 2025], // Dr. Michael teaches CS101
    [2, 2, 'Spring', 2025], // Dr. Jim teaches MATH101
    [3, 3, 'Fall', 2025], // Dr. Pam teaches PHYS101
    [4, 4, 'Spring', 2025], // Dr. Dwight teaches ACC101
    [5, 5, 'Fall', 2025] // Dr. Angela teaches CHEM101
];

foreach ($assignments as $assignment) {
    $course_id = $assignment[1];
    $sql_check_course = "SELECT COUNT(*) FROM Courses WHERE course_id = $course_id";
    $result_check_course = $conn->query($sql_check_course);
    $row_course = $result_check_course->fetch_row();

    if ($row_course[0] > 0) {
        $sql = "INSERT INTO Course_Assignments (instructor_id, course_id, semester, year)
                VALUES ({$assignment[0]}, {$assignment[1]}, '{$assignment[2]}', {$assignment[3]})";
        $conn->query($sql);
    } else {
        echo "Course with ID {$course_id} does not exist. Skipping assignment for this course.<br>";
    }
}


// 5. Enroll students in at least 2 courses each
$enrollments = [
    [1, 1, 'A'], [1, 2, 'B'], // Student 1 enrolled in CS101 and MATH101
    [2, 3, 'A'], [2, 4, 'B'], // Student 2 enrolled in PHYS101 and ACC101
    [3, 5, 'C'], [3, 1, 'B'], // Student 3 enrolled in CHEM101 and CS101
    [4, 2, 'B'], [4, 3, 'A'], // Student 4 enrolled in MATH101 and PHYS101
    [5, 4, 'B'], [5, 5, 'C'], // Student 5 enrolled in ACC101 and CHEM101
    [6, 1, 'A'], [6, 2, 'A'], // Student 6 enrolled in CS101 and MATH101
    [7, 3, 'B'], [7, 4, 'C'], // Student 7 enrolled in PHYS101 and ACC101
    [8, 5, 'A'], [8, 1, 'B'], // Student 8 enrolled in CHEM101 and CS101
    [9, 2, 'C'], [9, 3, 'B'], // Student 9 enrolled in MATH101 and PHYS101
    [10, 4, 'A'], [10, 5, 'C'] // Student 10 enrolled in ACC101 and CHEM101
];

foreach ($enrollments as $enrollment) {
    $course_id = $enrollment[1];
    $sql_check_course = "SELECT COUNT(*) FROM Courses WHERE course_id = $course_id";
    $result_check_course = $conn->query($sql_check_course);
    $row_course = $result_check_course->fetch_row();

    if ($row_course[0] > 0) {
        $sql = "INSERT INTO Enrollments (student_id, course_id, grade)
                VALUES ({$enrollment[0]}, {$enrollment[1]}, '{$enrollment[2]}')";
        $conn->query($sql);
    } else {
        echo "Course with ID {$course_id} does not exist. Skipping enrollment for this course.<br>";
    }
}

// Close the connection
$conn->close();

echo "Data inserted successfully.";
?>
