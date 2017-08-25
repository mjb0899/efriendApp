<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 07/08/2017
 * Time: 13:52
 */
session_start();
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>MusicAndMe</title>
    <!--MENUBAR CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<!--HEADER CODE-->
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




                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="features.php">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if(isset($_SESSION['name'])) {   echo"       <li><a href='eFriendAlgo.php'>eFriend Finder</a></li>"; }  ?>
                            <?php if(!isset($_SESSION['name'])) {   echo" "; }  ?>


                            <?php if(isset($_SESSION['name'])) {   echo"           <li><a href='eConnectAlgo.php'>eConnect</a></li>"; }  ?>
                            <?php if(!isset($_SESSION['name'])) {   echo""; }  ?>


                        </ul>
                    </li>
                    <li><a href="happyFriends.php">Happy Friends</a></li>
                    <li class="active"><a href="aboutUs.php">About Us</a></li>
                    <?php if(isset($_SESSION['name'])) {   echo"   <li>  <a href='messages.php'>Inbox</span></a></li> "; }  ?>
                     <?php if(isset($_SESSION['name'])) {   echo"   <li> <a href='userProfile.php'>My Profile</span></a></li>"; }  ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['name'])) {   echo"    <li><a href='registration.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li> "; }  ?>
                    <?php if(!isset($_SESSION['name'])) {   echo"  <li><a href='index.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li> "; }  ?>
                    <?php if(isset($_SESSION['name'])) {   echo'     
                                                                                                         
                                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="features.php">'. $_SESSION["name"].' <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        
                             <li><a href="messages.php"><span class="glyphicon glyphicon-envelope">Inbox</a></li>                  
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
<!--MAIN CODE-->



<p>.</p>
<div class="wrapper_reg2">
    <div class="container_reg3">
        <div class="wrapper_up">
            <h2>-eFriend-</h2>

            <p>
                <?php echo $_SESSION['name'].", "; ?> Thank you for being a part of eFriend.</p>

            <p>
                Technology has transformed the way people connect and establish relationships.
                Online dating has become one of the most used tools for people to socialize in the recent years. The amount of people using dating websites has been continuously increasing. However these sites aim to match people for online dating purposes.
            </p>
            The proposed project explores a new domain of matching people and how they connect. The primary goal of this domain is to help people make friends. This web service will help to diminish the awkwardness of dating website and help people meet without an ulterior motive of dating. For example, if a person likes football and wants to watch a game, he/she can check if there are others interested in football and ask them out to a game.
            <p>
            </p>

            <p>
                There is also a concept of "Darkroom" where two friends can be matched but cannot see each other and can start a conversation without worrying about " what if things don't work out". They can unmatch.
                If they are comfortable and feel they are connecting well, they can reveal their images and share photos.
                This will help people to boost their conversation abilities,build deeper connections and socialize better.
            </p>



            <h3 <?php if(isset($_SESSION['name'])) { ?>style="display:none;"<?php } ?> > Don't have a free account yet?</h3>
            <div class="wrapper_down">
                <a href="registration.php"> <button type="button" class="log-btn" <?php if(isset($_SESSION['name'])) { ?>style="display:none;"<?php } ?>  >Create Account</button></a>

            </div>
        </div>
    </div>

</div>






<!--FOOTER CODE!!-->
<footer>
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
