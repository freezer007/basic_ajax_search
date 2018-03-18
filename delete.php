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
$id = $_GET["id"];
$query = "SELECT * FROM document where id =".$id."";
$result = $conn->query($query) or die($conn->error);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        unlink("docs/".$row["url"]);
    }
}
$sql = "DELETE FROM document where id =".$id." ";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
     echo "Error deleting record: " . $conn->error;
}
header('Location: index.php');
?>