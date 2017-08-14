<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 24/07/2017
 * Time: 22:53
 */


session_start();

if(isset($_SESSION['name'])){

}else{
    header("location:index.php");

}
$username=$_SESSION['name'];
//include("eFriendAlgo.php"); // get match session set here !!!!!!!!IMPP
//get uid from table
//go to search info and get data
//add info code to array and
//find similar arrays
//display profile after array is successful




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
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/matcher.css">

    <script src="js/index.js"></script>
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
                <a class="navbar-brand menu_logo" href="index.php" >eFriend</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">



                    <?php if(isset($_SESSION['name'])) {   echo"    <li><a href='features.php'>Home</a></li>"; }  ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if(isset($_SESSION['name'])) {   echo"       <li><a href='features.php'>eFriend Finder</a></li>"; }  ?>
                            <?php if(!isset($_SESSION['name'])) {   echo"       <li><a href='efriendAd.php'>eFriend Finder</a></li>"; }  ?>


                            <?php if(isset($_SESSION['name'])) {   echo"           <li><a href='eFriendSurvey.php'>eConnect</a></li>"; }  ?>
                            <?php if(!isset($_SESSION['name'])) {   echo"           <li><a href='econnectAd.php'>eConnect</a></li>"; }  ?>


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
        <!--MIddle of container on matcher page-->
        <div class="matcherPage">


            <h2>We've Found You A Friend!!</h2>

            <div class="profileInfo">
                <div class="profile_image">
                    <!--get profile image and name-->
                    <?php
                    include("dbConnect.php");

                    $getMatch=$_SESSION['match'];
                    $sql_query = "select profile_image,uage,ufname from users where uusername='$getMatch'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {
                        $p = $row['profile_image'];
                        $uage=$row['uage'];
                        $ufname=$row['ufname'];
                     echo' <img src="'.$p.'" id="pic" class="middle">';
                     echo'<h3 class="middle">'.$ufname.", ".$uage.'</h3>';
                    }
                    ?>
                </div>
                <!--BIO-->
                <div class="profileBio">
                        <hr>
                    <?php
                    include("dbConnect.php");

                    $getMatch=$_SESSION['match'];
                    $sql_query = "select bio from profileinfo where uusername='$getMatch'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {
                        $bio = $row['bio'];
                        echo'<p>'.$bio.'</p>';
                    }
                    ?>
                    <hr>
                </div>
                <!--RESPONSE DIV VERY IMPORTANT-->
                <div class="response">
                    <div class="message">

                        <button type="submit" class="btn btn-success btn-flt" id="submit_accept" data-match="<?php echo $_SESSION['match'] ?>" onclick="return accept()">Message</button>

                    </div>

                    <div class="deny">

                        <button type="submit" class="btn btn-danger" id="submit_deny" onclick="return deny()">Deny</button>

                    </div>



                </div>
                <div class="profileBio">
                    <hr>

                    <?php
                    include("dbConnect.php");
                    include ("constants.php");

                    $getMatch=$_SESSION['match'];
                    $sql_query = "select like1,like2,like3,like4,like5,ambition,self,weekend,usex from profileinfo where uusername='$getMatch'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {
                        $like1 = $row['like1'];
                        $like2 = $row['like2'];
                        $like3 = $row['like3'];
                        $like4 = $row['like4'];
                        $like5 = $row['like5'];
                        $self = $row['self'];
                        $ambition = $row['ambition'];
                        $weekend = $row['weekend'];
                        $usex = $row['usex'];

                        include ("constants.php");
                        if($self=a){
                            $read_self=a;
                       }elseif($self=b) {
                            $read_self=b;

                        }elseif($self=c) {
                            $read_self=c;

                        }elseif($self=d) {
                            $read_self=d;

                        }elseif($self=e) {
                            $read_self=e;

                        }elseif($self=f) {
                            $read_self=f;

                        }else{
                            $read_self="awesomeness";
                        }

                        if($usex=="_3"){//male

                            echo'<p>He feels the best thing about him is'." ".$read_self.'</p>';
                            echo'<p>His interests are '.$like1."".$like2."".$like3."".$like4."".$like5."".'</p>';

                        }else{//female
                            echo'<p>She feels the best thing about her is'.$read_self.'</p>';
                            echo'<p>Her interests are '.$like1.", ".$like2.", ".$like3.", ".$like4." and ".$like5."".'</p>';

                        }
                    }
                    ?>
                    <hr>
                </div>
            </div>

<h3></h3>




            <!--CAROUSEL-->
            <!--  GET PATH OF IMAGES  -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php
                include("dbConnect.php");

                $count_cas=0;// count for carousel
                $getMatch=$_SESSION['match'];
                $sql_query = "select path from uploads where username='$getMatch'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()) {
                    $p = $row['path'];
                    if($count_cas==0){
                      echo'  <li data-target="#myCarousel" data-slide-to="'.$count_cas.'" class="active"></li>';
                      $count_cas=$count_cas+1;

                    }else{
                       echo' <li data-target="#myCarousel" data-slide-to="'.$count_cas.'"></li>';
                        $count_cas=$count_cas+1;
                    }
                }

                ?>

                <!--  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>-->

              </ol>

              <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                include("dbConnect.php");


                $count_cas=0;// count for carousel
                $getMatch=$_SESSION['match'];
                $sql_query = "select path from uploads where username='$getMatch'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()) {
                    $p = $row['path'];
                    if($count_cas==0){
                        echo'  <div class="item active">
                                <img src="'.$p.'" id="#pic2" alt="Los Angeles" >
                              </div>';
                        $count_cas=$count_cas+1;

                    }else{
                        echo'    <div class="item">
                                 <img src="'.$p.'" id="#pic2" alt="Chicago" >
                                 </div>';
                        $count_cas=$count_cas+1;
                    }
                }
                ?>

               <!-- <div class="item active">
                    <img src="images/mypic.png" id="#pic2" alt="Los Angeles" >
                </div>

                <div class="item">
                    <img src="images/mypic.png" id="#pic2" alt="Chicago" >
                </div>

                <div class="item">
                    <img src="images/mypic.png" id="#pic2" alt="New york" >
                </div>-->



            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
            <!--CAROUSEL END-->


            <!--PERSON DATA-->

            <div id="contact-info" class="vcard">

                <!-- Microformats! -->

                <h1 class="fn"><?php echo $_SESSION['match'] ?></h1>

                <p>
                    <!--ADD LOCATION HERE-->
                    Cell: <span class="tel">555-666-7777</span><br />
                    Email: <a class="email" href="mailto:greatoldone@lovecraft.com">greatoldone@lovecraft.com</a>
                </p>
            </div>

            <div id="objective">
                <p>
                    I am an outgoing and energetic (ask anybody) young professional, seeking a
                    career that fits my professional skills, personality, and murderous tendencies.
                    My squid-like head is a masterful problem solver and inspires fear in who gaze upon it.
                    I can bring world domination to your organization.
                </p>
            </div>
            <h1>Likes</h1>
            <p>ajfhsudgayudsisdigaisa</p>
            <h1>Likes</h1>
            <p>ajfhsudgayudsisdigaisa</p>

            <h1>Likes</h1>
            <p>ajfhsudgayudsisdigaisa</p>
            <h1>Likes</h1>
            <p>ajfhsudgayudsisdigaisa</p>







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