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

    <link rel="stylesheet" type="text/css" href="css/main.css">

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

<div class="container">
    <div class="wrapper_profile">
        <div class="div_top">

            <div class="profile_image">
                <img id="pic" src="images/rr2.png">
            </div>
            <h4>Morrison Barreto</h4>
        </div>
        <div class="div_middle">
            <p>Auto Generated Bio </p>
        </div>
        <div class="div_bottom">
            <p>Profile Info</p>
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home">My Info</a></li>
                <li><a data-toggle="pill" href="#menu1">Menu 1</a></li>
                <li><a data-toggle="pill" href="#menu2">Menu 2</a></li>
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
                                    <input type="text" name="firstname" id="lastname">
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
                                    <input type="email" name="age" id="email"  >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $sex?>
                                </td>
                                <td>
                                    <input type="email" name="sex" id="email"  >
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo $address?>
                                </td>
                                <td>
                                    <input type="email" name="address" id="email"  >
                                </td>
                            </tr>

                        </table>
                    </form>







                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Menu 3</h3>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </div>

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
