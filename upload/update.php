<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Stylish update</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glassy Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
 <!-- Style-CSS --> 
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body>
</script>
		<!--header-->
		<div class="header-w3l">
			<h1>Stylish update Form</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-w3layouts-agileinfo">
	           <!--form-stars-here-->
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
                $query = "SELECT * FROM document where id =".$_GET["id"]."";
                $result = $conn->query($query) or die($conn->error);
                while ($row = $result->fetch_assoc()) {
            ?>
						<div class="wthree-form">
							<h2>Fill out the form below to update file</h2>
							<form name="myform" action="supdate.php" method="post">
								<input type="hidden" name="id" value="<?php echo $_GET["id"];?>">
								<div class="form-sub-w3">
									<input type="text" name="Username" placeholder="File name " value="<?php echo $row["name"];?>" required="" />
								</div>
								<div class="form-sub-w3">
									<input type="text" name="Email" placeholder="Author " value="<?php echo $row["author"];?>" required="" />
								</div>
								<div class="form-sub-w3">
									<input type="text" name="pass" placeholder="Subject " value="<?php echo $row["subject"];?>" required="" />
								</div>
								<div class="submit-agileits">
								<input type="submit" value="Update">
								</div>
							</form>

						</div>
				<!--//form-ends-here-->
				<?php }
				?>

		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p>&copy; 2017 Glassy Login Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
		<!--//footer-->
</body>
</html>