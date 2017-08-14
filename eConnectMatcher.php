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



            <div class="profileInfo">
                <div class="found">
                    <h2 class="comic_font">We've Found You A CONNECTION!!</h2>

                </div>
                <div class="profile_image">
                    <!--get profile image and name-->
                    <?php
                    include("dbConnect.php");

                    $getMatch=$_SESSION['match'];
                    $sql_query = "select uage,ufname,ulname from users where uusername='$getMatch'";
                    $result = $db -> query($sql_query);
                    while($row = $result -> fetch_array()) {
                        $ulname = $row['ulname'];
                        $uage=$row['uage'];
                        $ufname=$row['ufname'];
                        $last=$ulname[0];
                        $first=$ufname[0];
                        echo '<h1>'.$first.$last.'</h1>';
                        echo'<h3 class="middle get_padding">'.$ufname.", ".$uage.'</h3>';
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

                            echo'<p>He feels the best thing about him is '." ".$read_self.'</p>';
                            echo'<p>His interests are '.$like1."".$like2."".$like3."".$like4."".$like5."".'</p>';

                        }else{//female
                            echo'<p>She feels the best thing about her is'.$read_self.'</p>';
                            echo'<p>Her interests are '.$like1.", ".$like2.", ".$like3.", ".$like4." and ".$like5."".'</p>';

                        }
                    }
                    ?>
                    <hr>
            </div>

            <div class="profileBio">
                <hr>

                <?php
                include("dbConnect.php");
                include ("constants.php");

                $getMatch=$_SESSION['match'];
                $sql_query = "select ambition,self,weekend from profileinfo where uusername='$getMatch'";
                $result = $db -> query($sql_query);
                while($row = $result -> fetch_array()) {

                    $self = $row['self'];
                    $ambition = $row['ambition'];
                    $weekend = $row['weekend'];
                    $usex = $row['usex'];

                    include ("constants.php");
                    if($ambition==1){
                        $amb=" very ambitious.";
                    }elseif($ambition==2) {
                        $amb=" ambitious.";

                    }elseif($ambition==3) {
                        $amb=" a little ambitious.";

                    }else{
                        $amb=0;
                    }

                    if($weekend==p){
                        $week=" at home.";
                    }elseif($weekend==q) {
                        $week=" somewhere out.";

                    }elseif($weekend==r) {
                        $week=" at work sometimes.";

                    }else{
                        $week=0;
                    }

//add approaches

                    if($usex=="_3"){//male

                        echo'<p>He is '." ".$amb.'</p>';
                        echo'<p>He likes his weekend'." ".$week.'</p>';
                        //    echo'<p>He prefers approaches by'." ".$week.'</p>';


                    }else{//female
                        echo'<p>She is'." ".$amb.'</p>';
                        echo'<p>She likes her weekend'." ".$week.'</p>';
                        //   echo'<p>She likes her weekend'." ".$week.'</p>';

                    }
                }
                ?>
                <hr>




            </div>


        </div><!--MAtcherpage-->


    </div><!--container-->

















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