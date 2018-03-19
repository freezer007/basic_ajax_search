<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "itas";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$user = $_POST["Username"];
$email = $_POST["Email"];
$password = $_POST["pass"];
$id = $_POST["id"];
$sql = "UPDATE document SET name ='".$user."', author ='".$email."',subject ='".$password."' where id ='".$id."'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location: ../index.php');
} else {
    echo "Error updating record: " . $conn->error;
}

?>