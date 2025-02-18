<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Course_Assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_id INT,
    course_id INT,
    semester VARCHAR(50),
    year YEAR,
    FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'Course_Assignments' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
