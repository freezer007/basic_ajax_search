<?php

//CREDENTIALS FOR DB
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

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
    $query = "SELECT * FROM document WHERE name LIKE '%".$_GET["query"]."%'";
    $result = $conn->query($query) or die($conn->error);
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-xs-12 col-sm-6 col-md-4">';
            echo '<div class="image-flip" ontouchstart="this.classList.toggle("hover");">';
            echo '<div class="mainflip">';
            echo '<div class="frontside">';
            echo '<div class="card">';
            echo '<div class="card-body text-center">';
            echo '<p><img class=" img-fluid" src="images/google-docs.png" alt="card image"></p>';
            echo '<h4 class="card-title">'.$row["name"].'</h4>';//
            echo '<p class="card-text">'.$row["url"].'</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="backside">';
            echo '<div class="card">';
            echo '<div class="card-body text-center mt-4">';
            echo '<a href="docs/'.$row["url"].'">';//
            echo '<h4 class="card-title">Name:-'.$row["name"].'</h4>';
            echo '<h4 class="card-title">Author:-'.$row["author"].'</h4>';
            echo '<h4 class="card-title">Subject:-'.$row["subject"].'</h4>';
            echo '<h4 class="card-title">Date:-'.$row["cdate"].'</h4>';
            echo '<h5>Click To download</h5>';
            echo '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }

?>
