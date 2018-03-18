<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "god";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE TABLE contact(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username varchar(30),
email varchar(30),
mobile varchar(10),
subject varchar(250)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table contact created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 

</body>
</html>