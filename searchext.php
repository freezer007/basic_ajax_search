<?php

//CREDENTIALS FOR DB
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

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_GET['query'])) {
if($_GET['cat'] == "blog"){
    $output = '';
    $query = "SELECT heading FROM ".$_GET['cat']." WHERE heading LIKE '%".$_GET["query"]."%' limit 0,5";
    $result = $conn->query($query) or die($conn->error);
    $output = '<ul class="list-unstyled">';
	$array = array();
    if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $output .= '<li>'.$row["heading"].'</li>';
    }}
    else
    {
        $output .= '<li>0 results</li>';
    }
    $output .= '</ul>';
    echo $output;
    //RETURN JSON ARRAY
}
}
?>
