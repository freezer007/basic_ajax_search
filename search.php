<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Limelight website for high end mobiles,like samsung nokia mobile website templates for free | Home :: w3layouts</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/fave-icon.png" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
       <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
       <script type="text/javascript">
            $(window).load(function(){
                $('div.description').each(function(){
                    $(this).css('display', 'block');
                });
                
                $('div.content-top-grid').hover(function(){
                    $(this).children('.description').stop().fadeTo(500, 1);
                },function(){
                    $(this).children('.description').stop().fadeTo(500, 0);
                });
            });
    </script>
    <meta http-equiv="Content-Language" content="en-us">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
    ul.list-unstyled{
        background-color: #eee;
        cursor: pointer;
    }
    li{
        padding: 12px;
    }
</style>
    </head>
    <body>
<?php
        session_start();
        echo $_SESSION["eml"];
        echo "<br>";
        echo $_SESSION["psw"];
        $dis = "display: none;";
        if ($_SESSION["eml"] != "")
{
    $dis = "";
}
    ?>
<?php
if(!isset($blog)) {
    $blog = "";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {   // form submit
    $blog = $_POST["blog"];
}

?>
<?php 
    $gen = $_GET["gener"];
    $op1 = "filter";
    $op2 = "filter";
    $op3 = "filter";
    $op4 = "filter";
    if($gen == "")
    {
        $gen1 = "blog";
        $op1 = "filter active";
    }
    else
    {
        $gen1 = $gen;
    }
    if($gen1 == "blog")
    {
        $op1 = "filter active";
    }
    if($gen1 == "user")
    {
        $op2 = "filter active";
    }
    if($gen1 == "bou")
    {
        $op3 = "filter active";
    }
    ?>
        <!---start-wrap---->
        <div class="wrap">
        <!---strat-header---->
        <div class="header"> 
            <div class="logo">
                <a href="index.php"> </a>
            </div>
            <div class="top-nav">
                <ul>
                    <li><a href="index.php"> <span> </span></a></li>
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="search.php?page=1&gener=blog" >Search</a></li>
                    <?php if ($_SESSION["per"] == "RWX"){?>
                    <li><a href="admin.php?gener=User&page=1">Admin</a></li>
                    <?php }?>
                    <li><a href="blog.php?page=1&gener=Mobile">Blog</a></li>
                    <?php if ($_SESSION["eml"] != ""){?>
                    <li><a href="profile.php" >Profile</a></li>
                    <?php }?>
                    <li><a href="about.php">About us</a></li>
                    <?php if ($_SESSION["eml"] != ""){?>
                    <li><a href="logout.php" >Logout</a></li>
                    <?php }?>
                    <div class="clear"> </div>
                </ul>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="clear"> </div>
        </div>
        <!---//End-header---->
        <div  style="width: 60%;align-content: center;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?page=1&gener=<?php echo $gen1;?>">
        <div class="input-group" style="align-content: left">
            <input type="text" class="form-control" placeholder="Search" name="blog" id="blog" style="margin-top: 2%">
            <div id="bloglist" name="bloglist" style="margin-top: 2%"></div>
            <div class="input-group-btn">
                <button class="btn btn-default" type="submit" id="btn2"><i class="glyphicon glyphicon-search" ></i></button>
            </div>
        </div>
        </form>
        </div><br><p id="abcd"></p>
        <script>
        $(document).ready(function() {
            $('#blog').keyup(function(){
                var query = $(this).val();
                if(query != '')
                {
                 $.ajax({
                        url:"searchext.php?cat=<?php echo $gen1;?>",
                        method:"GET",
                        data:{query:query},
                        success:function(data)
                        {
                            $('#bloglist').fadeIn();
                            $('#bloglist').html(data);
                        }
                    });
                }
            });
            $(document).on('click','li',function(){
                $('#blog').val($(this).text());
                $('#bloglist').fadeOut();
                document.getElementById('btn2').click();
            });
        });
    </script>
    <div class="blog">
            <ul id="filters" class="clearfix">
                <div class="wrap"> 
                        <li><a href="search.php?page=1&gener=blog"><span class="<?php echo $op1;?>" data-filter="icon">Blog</span></a></li>
                        <li><a href="search.php?page=1&gener=user"><span class="<?php echo $op2;?>" data-filter="web">User</span></a></li>
                        <li><a href="search.php?page=1&gener=bou"><span class="<?php echo $op3;?>" data-filter="app card icon logo web">Blog of user</span></a></li>
                        <div class="clear"> </div>
                </div>
            </ul>
            <div class="wrap">
                <div class="blog-header">
                    <h3><?php echo $gen1;?></h3>
                </div>
            </div>
            <div class="wrap"> 
            <div class="blog-grids" id="portfoliolist">
            <?php if($gen1 == "blog"){?>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "god";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $page = $_GET["page"];
                if($page == "" || $page == "1")
                {
                    $page1 = 0;
                }
                else
                {
                    $page1 = ($page*5) - 5;
                }
                $sql = "SELECT * FROM blog WHERE heading LIKE '%".$blog."%' ORDER BY blogdate DESC limit $page1,5";
                $result = $conn->query($sql) or die($conn->error);
                while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $name = $row["uname"];
                        $creatorid = $row["userid"];
                        $gener = $row["gener"];
                        $date = $row["blogdate"];
                        $src = $row["imsrc"];
                        $heading = $row["heading"];
                        $brief = $row["brief"];?>
                <div class="blog-articla-grid  portfolio1 logo1" data-cat="app">
                    <div class="blog-articla-grid-pic">
                        <a href="bsingle.php?blogid=<?php echo $id;?>"><img src="<?php echo $src; ?>" style="width:800px"" alt=" " ></a>
                    </div>
                    <div class="blog-articla-grid-info">
                        <h3><a href="bsingle.php?blogid=<?php echo $id;?>"><?php echo $heading; ?></a></h3>
                        <ul>
                            <li><p>post on<?php echo $date; ?></p></li>
                            <li><a href="userprofile.php?uid=<?php echo $creatorid; ?>">name-:<?php echo $name; ?></a></li>
                            <li><a href="blog.php?page=1&gener=<?php echo $gener;?>">gener:-<?php echo $gener; ?></a></li>
                            <p class="artical-para"><?php echo $brief; ?>
                            </p>
                            <a class="artbtn" href="bsingle.php?blogid=<?php echo $id;?>">Read More</a>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
            <?php
                }}
            ?>




            <?php if($gen1 == "user"){?>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "god";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $page = $_GET["page"];
                if($page == "" || $page == "1")
                {
                    $page1 = 0;
                }
                else
                {
                    $page1 = ($page*5) - 5;
                }
                $sql = "SELECT * FROM user WHERE uname LIKE '%".$blog."%' ORDER BY id DESC limit $page1,5";
                $result = $conn->query($sql) or die($conn->error);
                while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $heading = $row["uname"];
                        $name = $row["email"];
                        $gener = $row["gender"];
                        $src = $row["imsrc"];
                        ?>
                <div class="blog-articla-grid  portfolio1 logo1" data-cat="app">
                    <div class="blog-articla-grid-pic">
                        <a href="userprofile.php?uid=<?php echo $id; ?>"><img src="<?php echo $src; ?>" style="width:800px"" alt=" " ></a>
                    </div>
                    <div class="blog-articla-grid-info">
                        <h3><a href="userprofile.php?uid=<?php echo $id; ?>"><?php echo $heading; ?></a></h3>
                        <ul>
                            <li><a href="userprofile.php?uid=<?php echo $id; ?>">email:-<?php echo $name; ?></a></li><br>
                            <li><a href="userprofile.php?uid=<?php echo $id; ?>">gender:-<?php echo $gener; ?></a></li>
                            </p>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
            <?php
                }}
            ?>





            <?php if($gen1 == "bou"){?>
            <?php 
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "god";
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                $page = $_GET["page"];
                if($page == "" || $page == "1")
                {
                    $page1 = 0;
                }
                else
                {
                    $page1 = ($page*5) - 5;
                }
                $sql = "SELECT * FROM blog WHERE uname LIKE '%".$blog."%' ORDER BY blogdate DESC limit $page1,5";
                $result = $conn->query($sql) or die($conn->error);
                while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $name = $row["uname"];
                        $creatorid = $row["userid"];
                        $gener = $row["gener"];
                        $date = $row["blogdate"];
                        $src = $row["imsrc"];
                        $heading = $row["heading"];
                        $brief = $row["brief"];?>
                <div class="blog-articla-grid  portfolio1 logo1" data-cat="app">
                    <div class="blog-articla-grid-pic">
                        <a href="bsingle.php?blogid=<?php echo $id;?>"><img src="<?php echo $src; ?>" style="width:800px"" alt=" " ></a>
                    </div>
                    <div class="blog-articla-grid-info">
                        <h3><a href="bsingle.php?blogid=<?php echo $id;?>"><?php echo $heading; ?></a></h3>
                        <ul>
                            <li><p>post on<?php echo $date; ?></p></li>
                            <li><a href="userprofile.php?uid=<?php echo $creatorid; ?>">name-:<?php echo $name; ?></a></li>
                            <li><a href="blog.php?page=1&gener=<?php echo $gener;?>">gener:-<?php echo $gener; ?></a></li>
                            <p class="artical-para"><?php echo $brief; ?>
                            </p>
                            <a class="artbtn" href="bsingle.php?blogid=<?php echo $id;?>">Read More</a>
                        </ul>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
            <?php
                }}
            ?>
            </div>
            </div>
            <div class="clear"> </div>
            <div class="icons-pagenate">
                <ul>
                <li><a class="frist-page" href="search.php?page=1&gener=<?php echo $gen1;?>"> </a></li>
                <?php 
                if($gen1 == "blog"){ 
                    $sql = "SELECT * FROM blog WHERE heading LIKE '%".$blog."%'";
                    $res = $conn->query($sql) or die($conn->error);
                    $noofrows = $res->num_rows;
                    $noofrows = $noofrows/5;
                    $a = ceil($noofrows);
                    for($b=1;$b<=$a;$b++)
                    {
                        ?>
                    <li><a href="search.php?page=<?php echo $b;?>&gener=<?php echo $gen1;?>"><?php echo $b;?></a></li>
                <?php
                    }
                $conn->close();}
                ?>

                <?php 
                if($gen1 == "user"){ 
                    $sql = "SELECT * FROM user WHERE uname LIKE '%".$blog."%'";
                    $res = $conn->query($sql) or die($conn->error);
                    $noofrows = $res->num_rows;
                    $noofrows = $noofrows/5;
                    $a = ceil($noofrows);
                    for($b=1;$b<=$a;$b++)
                    {
                        ?>
                    <li><a href="search.php?page=<?php echo $b;?>&gener=<?php echo $gen1;?>"><?php echo $b;?></a></li>
                <?php
                    }
                $conn->close();}
                ?>

                <?php 
                if($gen1 == "bou"){ 
                    $sql = "SELECT * FROM blog WHERE uname LIKE '%".$blog."%'";
                    $res = $conn->query($sql) or die($conn->error);
                    $noofrows = $res->num_rows;
                    $noofrows = $noofrows/5;
                    $a = ceil($noofrows);
                    for($b=1;$b<=$a;$b++)
                    {
                        ?>
                    <li><a href="search.php?page=<?php echo $b;?>&gener=<?php echo $gen1;?>"><?php echo $b;?></a></li>
                <?php
                    }
                $conn->close();}
                ?>
                <li><a class="last-page" href="search.php?page=<?php echo $b-1;?>&gener=<?php echo $gen1;?>"> </a></li>
                    <div class="clear"> </div>
                </ul>
            </div>
            <div class="clear"> </div>
            </div>
        </div>
        <!---//End-articls---->
        <div class="bottom-grids">
            <div class="wrap"> 
            <div class="bottom-grid-left">
                <h3>Visit Our Shop</h3>
                <div class="bottom-grid-left-grid">
                    <div class="bottom-grid-left-grid-left">
                        <a href="#"><img src="images/bottom-pic.png" alt="" /></a>
                    </div>
                    <div class="bottom-grid-left-grid-right">
                        <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam et dolore magna aliqua.</p>
                        <a class="letbtn" href="#">Lets shop</a>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
            <div class="bottom-grid-right">
                <h3>Latest tweets</h3>
                <div class="bottom-grid-right-grid">
                    <div class="bottom-grid-right-grid-left">
                        
                    </div>
                    <div class="bottom-grid-right-grid-right">
                        <p><span>Eiusmod:</span>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <span><a href="#">#incididunt</a></span>
                        <label><a href="#">8 mins ago</a></label>
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
                <div class="bottom-grid-right-grid">
                    <div class="bottom-grid-right-grid-left">
                        
                    </div>
                    <div class="bottom-grid-right-grid-right">
                        <p><span>Eiusmod:</span>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        <span><a href="#">#incididunt</a></span>
                        <label><a href="#">2 days ago</a></label>
                    </div>
                    <div class="clear"> </div>
                </div>
            </div>
            <div class="clear"> </div>
            </div>
        </div>
        <!---//End-content---->
        <!---start-footer---->
        <div class="footer"> 
            <div class="wrap"> 
                <div class="footer-left">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="search.php">Archive</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <div class="clear"> </div>
                    </ul>
                </div>
                <div class="footer-center">
                    <ul>
                        <li><a href="#"><span> </span></a></li>
                        <li><a href="#"><span> </span></a></li>
                        <li><a href="#"><span> </span></a></li>
                        <li><a href="#"><span> </span></a></li>
                        <div class="clear"> </div>
                    </ul>
                </div>
                <div class="footer-right">
                    <p>Copyright &#169; 2013 Designer First. All Rights Reserved. Template By  <a href="http://w3layouts.com/">W3Layouts</a></p>
                </div>
                <div class="clear"> </div>
                </div>
        </div>
        <!---//End-footer---->
        <!---//End-wrap---->
         </div>
    </body>

</html>
