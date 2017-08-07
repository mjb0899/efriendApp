<?php

session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    header("url=pageNotFound.php");
    $username=null;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/main2.css">

    <script src="js/index.js"></script>

    <script>
        $(document).ready(function(){
                $("#edit_data").click(function(){
                        $("#edit_data").hide();
                        $("#submit_data").show();
                        $("#firstname").show();
                        $("#lastname").show();
                        $("#email").show();
                        $("#psw").show();
                    }
                );
            }
        );
    </script>
    <script>
        $(document).ready(function(){
                $("#submit_data").click(function(){
                        $("#edit_data").show();
                        $("#submit_data").hide();
                        $("#firstname").hide();
                        $("#lastname").hide();
                        $("#email").hide();
                        $("#psw").hide();
                    }
                );
            }
        );
    </script>
    <style>
        div.gallery {
            border: 1px solid #ccc;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }

        * {
            box-sizing: border-box;
        }

        .responsive {
            padding: 0 6px;
            float: left;
            width: 24.99999%;
        }

        @media only screen and (max-width: 700px){
            .responsive {
                width: 49.99999%;
                margin: 6px 0;
            }
        }

        @media only screen and (max-width: 500px){
            .responsive {
                width: 100%;
            }
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>


</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
<header>
    <nav class="navbar navbar-inverse navbar-fixed-top menu_logo">
        <div class="container-fluid">
            <div class="navbar-header menu_logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand menu_logo" href="#" >eFriend</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="userProfile.php">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="features.php">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="features.php">eFriend Finder</a></li>
                            <li><a href="features.php">eConnect</a></li>
                        </ul>
                    </li>
                    <li><a href="happyFriends.php">Happy Friends</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <?php if(!isset($_SESSION['name'])) {   echo"    <li><a href='registration.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li> "; }  ?>
                        <?php if(!isset($_SESSION['name'])) {   echo"  <li><a href='index.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li> "; }  ?>
                        <?php if(isset($_SESSION['name'])) {   echo'     
                                                                                                         
                                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="">'. $_SESSION["name"].' <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                             <li><a href="userProfile.php"><span class="glyphicon glyphicon-th-list"></span>My Profile</a></li>
                             <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>


                       </ul>
                    </li>                                                         
                                                                                                         
                                                                                                         '; }  ?>

                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
<div class="container2">
    <div class="wrapper_profile">
        <div class="div_top">

            <div class="profile_image">

                <?php
                include("dbConnect.php");


                try{
                    $sql_query = "Select profile_image,uusername from users Where uusername='$username'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {
                        $profile_path = $row['profile_image'];
                        $user = $row['uusername'];
//upload profile picture


                        if($profile_path!=null)   {
                            echo "<img id='pic' src=\"$profile_path\" >";

                        } else{
                            echo ' <img id="pic" src="images/default.jpg">';

                        }




                    }
                }catch(PDOException $exception){


                    echo ' <img id="pic" src="images/default.jpg">';


                }


                ?>













            </div>

            <?php
            if(isset($_SESSION['name'])){
                echo '<div class="container">
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn-place" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></button>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                         <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Upload Profile Image</h4>
                                            </div>
                                             <div class="modal-body">
                                                <form action="uploadImage.php" method="post" enctype="multipart/form-data">
                                                <input type="file" name="file" id="exampleInputFile" required>
                                                <button type="submit" class="btn btn-default btn-sm" name="submit"> <span class="glyphicon glyphicon-pencil">Upload</span></button>
                                                </form>
                                             </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                         </div>
                                 </div>
                                </div>
                            </div>';
            }
            ?>
            <h4>Morrison Barreto</h4>
        </div>
        <div class="div_middle">
            <p>Auto Generated Bio </p>
        </div>
        <div class="div_bottom">
            <p>Profile Info</p>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">My Info</a></li>
                <li><a data-toggle="pill" href="#menu1">Search Info</a></li>
                <li><a data-toggle="pill" href="#menu2">Your Images</a></li>
                <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>Profile Info</h3>
                    <h3><?php echo $username ?></h3>


                    <?php
                    include("dbConnect.php");
                    $sql_query = "Select ufname,ulname,uemail,uage,usex,uaddress from users Where uusername='$username'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()){
                        $firstname= $row['ufname'];
                        $lastname= $row['ulname'];
                        $email= $row['uemail'];
                        $age= $row['uage'];
                        $sex= $row['usex'];
                        $address= $row['uaddress'];
                    }
                    ?>
                    <form>
                        <table style="width:100%">
                            <tr>
                                <td>
                                    <?php echo $firstname?>
                                </td>
                                <td>
                                    <input type="text" name="firstname" id="firstname">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $lastname?>
                                </td>
                                <td>
                                    <input type="text" name="lastname" id="lastname">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $email?>
                                </td>
                                <td>
                                    <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" >
                                </td>
                            </tr>
                        <?php
                            if(isset($_SESSION['name'])){
                                echo' <tr>
                                    <td>Change Password</td>
                                    <td><input type="password" name="psw" id="psw"></td>
                                   </tr>';
                            }
                            ?>
                            <tr>
                                <td>
                                    <?php echo $age?>
                                </td>
                                <td>
                                    <input type="email" name="age" id="age"  >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $sex?>
                                </td>
                                <td>
                                    <input type="email" name="sex" id="sex"  >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $address?>
                                </td>
                                <td>
                                    <input type="email" name="address" id="address"  >
                                </td>
                            </tr>

                        </table>
                    </form>
                    <?php
                    if(isset($_SESSION['name'])){
                        echo'
                        <div>
                        <button id="edit_data"><span class="glyphicon glyphicon-pencil"></button>
                        <button type="submit" id="submit_data" onclick="return chk()"> Save</button>
                        </div>';
                    }
                    ?>
                    <div id="test">
                    </div>






                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Search Info</h3>
                    <p>Show and update search Information like sex,place</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Image Gallery</h3>

                    <!--UPLOAD MODAL-->
                    <?php
                    if(isset($_SESSION['name'])){
                        echo '<div class="container">
                                <!-- Trigger the modal with a button -->
                                <hr>

                                <button type="button" class="btn-place" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-pencil"></button>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                         <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Upload Images</h4>
                                            </div>
                                             <div class="modal-body">
                                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                                <input type="file" name="file" id="exampleInputFile" required>
                                                <button type="submit" class="btn btn-default btn-sm" name="submit"> <span class="glyphicon glyphicon-pencil">Upload</span></button>
                                                </form>
                                             </div>
                                            <div class="modal-footer">
                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                         </div>
                                 </div>
                                </div>
                            </div>';
                    }
                    ?>


                    <!--GALLERY-->



















                    <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" href="images/default.jpg">
                                <img src="images/default.jpg" alt="Trolltunga Norway" width="300" height="200">
                            </a>
                        </div>
                    </div>


                    <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" href="images/default.jpg">
                                <img src="images/default.jpg" alt="Forest" width="600" height="400">
                            </a>
                        </div>
                    </div>

                    <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" href="images/default.jpg">
                                <img src="images/default.jpg" alt="Northern Lights" width="600" height="400">
                            </a>
                        </div>
                    </div>

                    <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" href="images/default.jpg">
                                <img src="images/default.jpg" alt="Mountains" width="600" height="400">
                            </a>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div style="padding:6px;">
                        <p>This example use media queries to re-arrange the images on different screen sizes: for screens larger than 700px wide, it will show four images side by side, for screens smaller than 700px, it will show two images side by side. For screens smaller than 500px, the images will stack vertically (100%).</p>
                        <p>You will learn more about media queries and responsive web design later in our CSS Tutorial.</p>
                    </div>












                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>

        </div>



    </div>
</div>
</main>




<footer style="clear: both;">
    <div class="footer_left" >
        <h1>eFriend</h1>
    </div>
    <div class="footer_right" >
        <a target="_blank" title="follow me on facebook" href="http://www.facebook.com/PLACEHOLDER"><img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a>
        <a target="_blank" title="follow me on Twitter" href="http://www.twitter.com/PLACEHOLDER"><img alt="follow me on Twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter30x30.png" border=0></a>
        <a target="_blank" title="follow me on instagram" href="http://www.instagram.com/PLACEHOLDER"><img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram30x30.png" border=0></a>
    </div>
    <div class="footer_below" >
        <h5>Copyright &copy; 2017 &bull; All rights reserved &bull; Music&me.com</h5>
    </div>
</footer>
</body>
</html>
