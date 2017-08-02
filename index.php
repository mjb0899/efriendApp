<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/07/2017
 * Time: 20:58
 */
session_start();
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
                <a class="navbar-brand menu_logo" href="#" >eFriend</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Features <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="features.php">eFriend Finder</a></li>
                            <li><a href="eFriendSurvey.php">eConnect</a></li>
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

<div class="container">
    <div class="wrapper_quote">
        <h1>Finding Friends Just Got Easier</h1>
    </div>
    <div class="wrapper_box_surround">
        <div class="wrapper_box">
            <form action="login.php" method="post">
                <label for="exampleInputEmail1" class="label_font">Username</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Email" title="Invalid input" pattern="[^'\x22]+" required="">
                </div>
                <label for="exampleInputPassword1" class="label_font">Password</label>
                <div class="form-group">

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" title="Invalid Input" pattern="[^'\x22]+" required="">
                </div>
                <div id="error">
                    <span class="glyphicon glyphicon-remove red"></span><?php echo $_SESSION['errmsg'] ?>
                </div>
                <div class="buttonholder register_link">
                    <input type="submit" class="btn btn-default" id="loginbtn" value="Login">
                    <a href="registration.php"> <p>Not Registered yet?</p></a>
                </div>


            </form>
        </div>
    </div>
</div>
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
