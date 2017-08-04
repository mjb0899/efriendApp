<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 24/07/2017
 * Time: 22:53
 */


session_start();
if(isset($_SESSION['name'])){
    $username=$_SESSION['name'];
}else{
    $username=null;
    header("url=pageNotFound.php");
}


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
                <a class="navbar-brand menu_logo" href="#" >eFriend</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">eFriend Finder</a></li>
                            <li><a href="#">eConnect</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Happy Friends</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="container2">
        <!--MIddle of container on matcher page-->
        <div class="matcherPage">

            <!--CAROUSEL-->
            <h2>Carousel Example2</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/mypic.png" id="#pic2" alt="Los Angeles" >
                </div>

                <div class="item">
                    <img src="images/mypic.png" id="#pic2" alt="Chicago" >
                </div>

                <div class="item">
                    <img src="images/mypic.png" id="#pic2" alt="New york" >
                </div>
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

            <!--PERSON DATA-->

            <div id="contact-info" class="vcard">

                <!-- Microformats! -->

                <h1 class="fn">C'thulhu</h1>

                <p>
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

            <div class="clear"></div>

            <dl>
                <dd class="clear"></dd>

                <dt>Education</dt>
                <dd>
                    <h2>Withering Madness University - Planet Vhoorl</h2>
                    <p><strong>Major:</strong> Public Relations<br />
                        <strong>Minor:</strong> Scale Tending</p>
                </dd>

                <dd class="clear"></dd>

                <dt>Skills</dt>
                <dd>
                    <h2>Office skills</h2>
                    <p>Office and records management, database administration, event organization, customer support, travel coordination</p>

                    <h2>Computer skills</h2>
                    <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
                </dd>

                <dd class="clear"></dd>



                <dd class="clear"></dd>

                <dt>Hobbies</dt>
                <dd>World Domination, Deep Sea Diving, Murder Most Foul</dd>

                <dd class="clear"></dd>

                <dt>References</dt>
                <dd>Available on request</dd>

                <dd class="clear"></dd>
            </dl>


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