<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    course_code VARCHAR(50) UNIQUE NOT NULL,
    credits INT NOT NULL,
    department VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'Courses' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
