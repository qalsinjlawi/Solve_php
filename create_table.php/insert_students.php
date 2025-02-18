<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_courses = "INSERT IGNORE INTO Courses (course_name, course_code, credits, department)
        VALUES 
        ('Introduction to Computer Science', 'CS101', 3, 'Computer Science'),
        ('Linear Algebra', 'MATH101', 3, 'Mathematics'),
        ('Classical Mechanics', 'PHYS101', 4, 'Physics')";

if ($conn->query($sql_courses) === TRUE) {
    echo "New courses created successfully or already exists<br>";
} else {
    echo "Error: " . $sql_courses . "<br>" . $conn->error;
}

$sql_students = "INSERT IGNORE INTO Students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year)
        VALUES
        ('John', 'Doe', 'john.doe@example.com', '2000-01-15', 'Male', 'Computer Science', 2022),
        ('Jane', 'Smith', 'jane.smith@example.com', '2001-05-20', 'Female', 'Mathematics', 2021),
        ('Alex', 'Johnson', 'alex.johnson@example.com', '2000-11-25', 'Male', 'Physics', 2023)";

if ($conn->query($sql_students) === TRUE) {
    echo "New students created successfully or already exists<br>";
} else {
    echo "Error: " . $sql_students . "<br>" . $conn->error;
}

$conn->close();
?>
