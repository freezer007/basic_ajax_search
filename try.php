<?php 
session_start();
if($_SESSION["per"] != "RWX")
{
	@header("Location:/index.php");
}
if(isset($_SESSION["id"]))
{
	@header("Location:/index.php");
}
if($_SESSION["per"] != "R--")
{
	@header("Location:/index.php");
}

if($_SESSION["per"] != "RW-")
{
	@header("Location:/index.php");
}
if($_SESSION["id"] != $creatorid){
	@header("Location:/index.php");
}
?>
<?php
$message = "";
if($_GET["email"] != "" AND $_GET["hash"] != "")
{
    // Verify data
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
	
	$sql = "SELECT email, hash, isactive FROM user WHERE email='".$email."' AND hash='".$hash."' AND isactive='0'";
	$result = $conn->query($sql) or die($conn->error);
	$match  = $result->num_rows;
	echo $match;
	if($match > 0){
        // We have a match, activate the account
        $sql = "UPDATE user SET isactive='1' WHERE email='".$email."' AND hash='".$hash."' AND isactive='0'";
		$result = $conn->query($sql) or die($conn->error);
        $message = "Your account has been activated, you can now login";
    }else{
        // No match -> invalid url or account has already been activated.
         $message = "The url is either invalid or you already have activated your account";
    }
    $conn->close();
}
else{
    // Invalid approach
     $message = "Invalid approach, please use the link that has been send to your email";
 }
?>