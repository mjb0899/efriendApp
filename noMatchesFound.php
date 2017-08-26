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
<body style="background-image: url(images/no_matches.png);background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover">
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



                <?php if(isset($_SESSION['name'])) {   echo'
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="features.php">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">';}?>

                <?php if(isset($_SESSION['name'])) {   echo"       <li><a href='eFriendAlgo.php'>eFriend Finder</a></li>"; }  ?>
                <?php if(!isset($_SESSION['name'])) {   echo" "; }  ?>


                <?php if(isset($_SESSION['name'])) {   echo"           <li><a href='eConnectAlgo.php'>eConnect</a></li>"; }  ?>
                <?php if(!isset($_SESSION['name'])) {   echo""; }  ?>

                <?php if(isset($_SESSION['name'])) {   echo'
                        </ul>
                    </li>';}?>

                <?php if(!isset($_SESSION['name'])) {   echo"    <li><a href='features.php'>Home</a></li>"; }  ?>

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
</body>
</html>