<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    grade VARCHAR(10),
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'Enrollments' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
