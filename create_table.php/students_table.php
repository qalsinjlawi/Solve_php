<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "University";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    major VARCHAR(100),
    enrollment_year YEAR NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'Students' created successfully or already exists";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
