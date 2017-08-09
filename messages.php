<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/07/2017
 * Time: 20:58
 */
session_start();

if(!isset($_SESSION['name'])){
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
    <link rel="stylesheet" type="text/css" href="css/bubble.css">



<script>
    $(document).ready(function () {

        $(".tdelete").on("click", function (e) {
            e.preventDefault();


            var person = $(this).attr("data-nm");

            var dataString = 'persondata=' + person;
            $.ajax({
                type: "post",
                url: "textGetter.php",
                data: dataString,
                cache: false,

                 success: function (d) {
                 if (d > 0) {


                     //     $("#texter").load("#texter");


                     //alert(d);
                  //   $( "#texter" ).load(window.location.href + " #texter" );
                     $('#texter').load(" #matter_get");

                 } else if (d == 0) {

                 alert("Deny saved");
                 }
                 else {

                 alert("nothing saved");

                 }
                 }

            });

            });

        });

</script>

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

<div class="container_message">
    <div class="wrapper_convo">
        <!-- GET ALL MESSAGES/CONVOS FROM DB ie MESSAGE TABLE -->

        <?php
        //get convos



        ?>


        <div>
            <hr>
            <!--PASS id to ajax func-->

            <!--<h1 class="entry-title"><?php //echo $_SESSION['name'] ?></h1>-->
             <a href="javascript:void();" class="tdelete" data-nm="<?php echo $_SESSION['name'];?>"><?php echo $_SESSION['name'];?></a>




            <hr>
        </div>
        <!--Hidden textbox for on click-->
     <!--   <input id="personName" type="hidden" value="" onclick="">-->

        <div>
            <hr>
            <!--PASS id to ajax func-->

            <!--<h1 class="entry-title"><?php //echo $_SESSION['name'] ?></h1>-->
            <a href="javascript:void();" class="tdelete" data-nm="myron10">myron10</a>




            <hr>
        </div>

    </div>
    <div class="wrapper_content" id="texter">
        <!-- GET ALL CONTENT FROM DB ie CONVO TABLE using mid -->
       <div id="matter_get">
                <div class="matter">
                              <div class="talk-bubble tri-right left-top messageFloaterLeft">
                                  <div class="talktext">
                                      <h3><?php echo $_SESSION['check']?></h3>
                                      <p>HEY THERE</p>
                                  </div>
                              </div>



                              <div class="talk-bubble tri-right btm-right messageFloaterRight">
                                  <div class="talktext">
                                      <p>Hello Buddy</p>
                                  </div>
                              </div>
                </div>

                <div class="text_input">
                            <div class="absol">
                                <div class="form-group area_left">
                                    <textarea class="form-control" rows="3" id="msgSend"></textarea>
                                </div>
                                <div class="form-group area_right">
                                <button type="submit" class="btn btn-info btn-lg">>></button>

                                </div>
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
