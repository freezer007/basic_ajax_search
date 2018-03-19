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


$id = -1;
$query = "SELECT * FROM document";
$result = $conn->query($query) or die($conn->error);
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
    }
}
$id = $id + 1;






$user = $_POST["Username"];
$email = $_POST["Email"];
$password = $_POST["pass"];

$target_dir = "../docs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx"
&& $imageFileType != "ppt" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, unsupported file format.";
    $uploadOk = 0;
}
$type = "images/google-docs.png";
if( $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
    $type = "docs/".$_FILES["fileToUpload"]["name"]."";
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql = "INSERT INTO document (name, author, subject ,cdate ,img ,url )
        VALUES ('".$user."','".$email."','".$password."','".date("d/m/y")."','".$type."','".$_FILES["fileToUpload"]["name"]."')";
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		    header('Location: ../');
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>