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
$uid=$_SESSION['userNum'];
$get_mid=$_SESSION['mid'];
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

    <script src="js/index.js"></script>


    <script>
    $(document).ready(function () {

        $(".tdelete").on("click", function (e) {
            e.preventDefault();


            var person = $(this).attr("data-nm");

            var dataString = 'persondata=' + person;
            $.ajax({
                type: "post",
                url: "getText.php",
                data: dataString,
                cache: false,

                 success: function (d) {
                 if (d > 0) {


                     //     $("#texter").load("#texter");


                     //alert(d);
                  //   $( "#texter" ).load(window.location.href + " #texter" );
                     $('#hidethis').hide();
                     $('#texter').load(" #matter_get");
                     var element = document.getElementById("scroller");
                     element.scrollTop = element.scrollHeight;

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
                    <li><a href="sessions.php">View Active Sessions</a></li>

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
//getting convos people

        include("dbConnect.php");

        $sql_query = "Select mid,match_uname,start_date from message Where uid='$uid'";
        $result = $db -> query($sql_query);
        while($row = $result -> fetch_array()) {
            $mid = $row['mid'];
            $m_name = $row['match_uname'];
            $s_date = $row['start_date'];
            echo '<script language="javascript">';
            echo 'alert("'.$mid."//".$m_name."//".$s_date.'")';
            echo '</script>';

      echo' <div>
            <hr>
             <a href="javascript:void();" class="tdelete" data-nm="'.$m_name.'"> '. $m_name. ' </a>
            <hr>
            </div>';


        }
        ?>


        <div>
            <hr>
              <a href="javascript:void();" class="tdelete" data-nm="<?php echo $_SESSION['name'];?>"><?php echo $_SESSION['name'];?></a>
            <hr>
        </div><!--LONE DIV CLOSE TAG-->


        <div>
            <hr>
                <a href="javascript:void();" class="tdelete" data-nm="myron10">myron10</a>
            <hr>
        </div><!--LONE DIV CLOSE TAG-->

    </div><!--WRAPPER CONVO CLOSE TAG( Left Side )-->

    <div class="wrapper_content" id="texter">
        <!-- GET ALL CONTENT FROM DB ie CONVO TABLE using mid -->


       <div id="matter_get"><!--IMPORTANT DIV HELPS TO RELOAD-->


           <!--RETRIEVE OLD CONVERSATIONS-->
               <!--RETRIEVE MESSAGE CONTENT HERE-->

                        <div class="matter" id="scroller">

                            <?php
                            //getting convos people

                            include("dbConnect.php");

                            $convo_id=$_SESSION['mid'];//funny

                            if($convo_id==null){
                                echo '<h1 id="hidethis">SELECT CONVERSATION</h1>';
                                echo $_SESSION['mid'];
                            }else {

                                        $sql_query = "Select content,sender,start_date from convo Where mid='$convo_id'";
                                        $result = $db->query($sql_query);
                                        while ($row = $result->fetch_array()) {
                                                $content = $row['content'];
                                                $sender = $row['sender'];
                                                $s_date = $row['start_date'];

                                            if ($sender == $_SESSION['name']) {
                                                            echo '    <div class="talk-bubble tri-right btm-right messageFloaterRight" style="clear: both;">
                                                              <div class="talktext">
                                                                  <p>'.$content.'</p>
                                                              </div>
                                                          </div>';
                                            } else {
                                                        echo '   <div class="talk-bubble tri-right left-top messageFloaterLeft" style="clear: both;">
                                                          <div class="talktext">
                                                              <h3><?php echo $_SESSION[\'check\']?></h3>
                                                              <p>'.$content.'</p>
                                                          </div>
                                                            </div>';
                                            }

                                            //create bubble


                                        }//end while

                            }//end else
                            ?>





                                      <div class="talk-bubble tri-right left-top messageFloaterLeft">
                                          <div class="talktext">
                                              <hr>
                                              <h3><?php echo $_SESSION['check']?></h3>
                                              <p>HEY THERE</p>
                                          </div>
                                      </div>



                                      <div class="talk-bubble tri-right btm-right messageFloaterRight">
                                          <div class="talktext">
                                              <hr>
                                              <h3><?php echo $_SESSION['mid']?></h3>
                                              <p>Hello Buddy</p>
                                          </div>
                                      </div>
                        </div><!--MATTER CLOSE TAG-->




               <!--SEND MESSAGE HERE-->

                    <div class="text_input">
                                <div class="absol">
                                    <div class="form-group area_left">
                                        <textarea class="form-control" rows="3" id="msgSend" maxlength="100"></textarea>
                                    </div>
                                    <div class="form-group area_right">
                                    <button type="submit" class="btn btn-info btn-lg" onclick="return send()">>></button>

                                    </div>
                                </div>
                    </div><!--TEXT INPUT CLOSE TAG-->

       </div><!-- ID MATTER GET  CLOSE TAG-->

    </div><!--WRAPPER CONTENT CLOSE TAG(right side)-->




</div><!--MESSAGE CONTAINER CLOSE TAG-->
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
