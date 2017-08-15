<?php

session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
    $uid = $_SESSION['userNum'];
}else{
    header("url=pageNotFound.php");
    $username=null;
    $uid = null;

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
    <style type="text/css">
        textarea[name=bio] {
            resize: none;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


    </style>
    <script>
        //   $(document).ready(function () {
        //        $("submit").click(function () {
        //            var like1 =document.getElementById('like1').value;
        //            var like2 =document.getElementById('like2').value;
        //           var like3 =document.getElementById('like3').value;
        //            var like4 =document.getElementById('like4').value;
        //            var like5 =document.getElementById('like5').value;
        //            document.getElementById('likes').value=like1+'#'+like2+'#'+like3+'#'+like4+'#'+like5;
        //        })
        //    })

    </script>

    <script type="text/javascript">
        function join_ym()
        {
            var like1 =document.getElementById('like1').value;
            var like2 =document.getElementById('like2').value;
            var like3 =document.getElementById('like3').value;
            var like4 =document.getElementById('like4').value;
            var like5 =document.getElementById('like5').value;
            document.getElementById('likes').value=like1+'#'+like2+'#'+like3+'#'+like4+'#'+like5;
            //    alert(document.getElementById('likes').value);
        }
    </script>
    <title>jQuery UI Slider - Range slider</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 18,
                max: 100,
                values: [ 25, 60 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                }
            });
            $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
                " - " + $( "#slider-range" ).slider( "values", 1 ) );
        } );
    </script>

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
            <h4>
                <?php echo $firstname." ".$lastname?>
            </h4>
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
                <form id="menu1" class="tab-pane fade">
                    <ol>
                        <form action="updateMatrix.php" method="post">

                    <div style="clear: both" >

                        <li>Create a small bio about something you like?</li> <!--BIO-->
                        <textarea name="bio" rows="5" class="form-control" cols="30" placeholder="Say something here" id="tarea">
                     </textarea>
                        <br>
                        <p>
                            Slide right for a generic auto generated bio
                        </p>
                        <label  class="switch">
                            <input type="checkbox" onclick="document.getElementById('tarea').disabled=this.checked;" >
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="mySlider" style="padding: 1rem;">
                        <p>
                            <label for="amount">Search Age:</label>
                            <input type="text" name="ageRange" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;width:5rem;">
                        </p>

                        <div id="slider-range"style="width:20rem;"></div>

                    </div class="form-group">
                    <div>
                    <li>Your friend should be a?</li>
                    <select class="form-control" name="searchSex">
                        <option value="_3">Male</option>
                        <option value="_4">Female</option>
                        <option value="z">Doesn't Matter</option>
                    </select>
                    </div>
                    </ol>

                    <button type="submit" class="signupbtn" onclick="join_ym();">Update Information</button>

                </form>






                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Image Gallery</h3>

                    <!--UPLOAD MODAL-->
                    <?php
                    if(isset($_SESSION['name'])){
                        echo '<div class="container">
                                <!-- Trigger the modal with a button -->
                                <hr>

                                <button type="button" class="btn-place" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-pencil"></button>
                                <hr>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal2" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                         <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Update Gallery</h4>
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
                    <?php
                    include('dbConnect.php');
                    $sql_query = "Select path from uploads Where uid='$uid'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {

                        $path = $row['path'];

                        $count=$count+1;

                        if($path!=null){
                            echo '  <div class="responsive">
                        <div class="gallery">
                            <a target="_blank" href="'.$path.'">
                                <img src="'.$path.'" alt="Trolltunga Norway" width="300" height="200">
                            </a>
                        </div>
                    </div> ';
                        }





                    }?>

<!--

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
-->
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
