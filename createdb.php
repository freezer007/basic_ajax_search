<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create database
$sql = "CREATE DATABASE god";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}

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

$sql = "CREATE TABLE user(
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uname VARCHAR(30) NOT NULL,
email varchar(50) NOT NULL,
password VARCHAR(15) NOT NULL,
imsrc varchar(20000) DEFAULT 'images/userpic.png',
hash varchar(32) DEFAULT 'COMEON',
isactive boolean DEFAULT false,
gender varchar(1),
description varchar(2500) DEFAULT 'INDIAN',
contry varchar(20) DEFAULT 'INDIA',
lastsaw timestamp DEFAULT CURRENT_TIMESTAMP,
permission varchar(3) DEFAULT 'RW-'
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
    echo "<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE follow(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) NOT NULL,
follows boolean DEFAULT true,
followerid INT(8)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table follow created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE blog(
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) NOT NULL,
uname VARCHAR(30) NOT NULL,
blogdate timestamp DEFAULT CURRENT_TIMESTAMP,
gener varchar(20) DEFAULT 'other',
imsrc varchar(20000) DEFAULT 'images/userpic.png',
heading varchar(50),
brief varchar(500),
fullblog varchar(20000)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table blog created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE comment(
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uname VARCHAR(30) NOT NULL,
userid INT(6),
blogid INT(8),
comment varchar(100),
commentdate timestamp DEFAULT CURRENT_TIMESTAMP
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table comment created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE reply(
id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
uname VARCHAR(30) NOT NULL,
userid INT(6),
reply varchar(100),
replydate timestamp DEFAULT CURRENT_TIMESTAMP,
commentid int(3)
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table reply created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE likes(
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
bloggerid INT(6),
blogid INT(6),
choise boolean DEFAULT false
)
";

if ($conn->query($sql) === TRUE) {
    echo "Table likes created successfully";
    echo "</br>";
} else {
    echo "Error creating table: " . $conn->error;
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