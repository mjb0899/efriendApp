<?php
session_start();
if(isset($_SESSION['name'])){

}else{
    header("location:index.php");

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

    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
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
                            <?php if(!isset($_SESSION['name'])) {   echo"       <li><a href='efriendAd.php'>eFriend Finder</a></li>"; }  ?>


                            <?php if(isset($_SESSION['name'])) {   echo"           <li><a href='eConnectAlgo.php'>eConnect</a></li>"; }  ?>
                            <?php if(!isset($_SESSION['name'])) {   echo"           <li><a href='econnectAd.php'>eConnect</a></li>"; }  ?>


                        </ul>
                    </li>
                    <li><a href="happyFriends.php">Happy Friends</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li>  <a href="messages.php"><span class="glyphicon glyphicon-th-list"></span></a></li>
                    <li> <a href="survey.php"><span class=" glyphicon glyphicon-tasks"></span></a></li>
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
<p>.</p>
<main style="height: 75%">
    <div class="container_main" style="height: 100%">
        <div class="wrapper_left" id="some-div">
            <a href="eFriendAlgo.php" class="fill-div">
            <div class="eFriendLogo"></div>       efriend <div class="wt_col"><p>Meet New People</p>  </div>
                <div class="wt_col"><p>Find a Friend?</p>  </div>

                <span id="some-element">
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
  </span>

            </a>


        </div>

        <div class="wrapper_right">


            <a href="eConnectAlgo.php" class="fill-div">
                <div class="eConnectLogo"></div>  eConnect

                <div class="wt_col"><p>Find a Connection?</p>  </div>
                <div class="wt_col"><p>Anonymous? <br> Reveal yourself if you think the connection is right!</p>  </div>
                <span id="some-element">
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
  </span>

            </a>




        </div>
    </div>
</main>

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
