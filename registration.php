

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>eFriendApp</title>
    <!--MENUBAR CSS-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/main.css">
    <script src="js/index.js"></script>

    <script>
        $(document).ready(function() {
            $("#rep_pwd").keyup(validate);
        });


        function validate() {
            var password1 = $("#pwd").val();
            var password2 = $("#rep_pwd").val();



            if(password1 == password2) {
                $("#validate-status").css({"color": "green", "font-size": "large"});
                $("#validate-status").text("Match");
            }
            else {style="font-size: large;color: red;"
                $("#validate-status").css({"color": "red", "font-size": "large"});
                $("#validate-status").text("Passwords Do Not Match");
            }

        }

        var checker = document.getElementById('checkme');
        var sendbtn = document.getElementById('enableme');
        // when unchecked or checked, run the function
        checker.onchange = function(){
            if(this.checked){
                sendbtn.disabled = false;
            } else {
                sendbtn.disabled = true;
            }

        }

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
                    <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="wrapper_reg">

        <form action="insertUser.php" method="post">
            <div class="container_reg">
                <div class="header_div">
                    <h2>  Join Our Family </h2>
                </div>
                <div >

                    <!--New form-->
                    <div >
                        <div class="form-group">
                            <label for="fname" class="label_font">First Name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" pattern="[A-Za-z]+" title="Letters Only" required>
                        </div>
                        <div class="form-group">
                            <label for="lname" class="label_font">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" pattern="[A-Za-z]+" title="Letters Only" required>
                        </div>
                        <div class="form-group">
                            <label for="usr" class="label_font">Pick a username:</label>
                            <input type="text" class="form-control" id="usr" name="username" onblur="return checkUsername()" placeholder="Select a username" pattern=".{6,}" title="Six or more characters" required>
                        </div>
                        <div class="alert alert-success" id="test">
                            <strong>Thats a cool Username!</strong> It's Available!
                        </div>
                        <div class="alert alert-danger" id="test2">
                            <strong>Sorry!</strong> Username taken!
                        </div>
                        <!--ALERTS-->
                        <div class="alert alert-success hide" id="available">
                            <strong>Success!</strong> You should <a href="#" class="alert-link">read this message</a>.
                        </div>
                        <div class="alert alert-danger hide" id="not_available">
                            <strong>Danger!</strong> You should <a href="#" class="alert-link">read this message</a>.
                        </div>
                        <!--ALERTS-->

                        <div class="form-group">
                            <label for="age" class="label_font">Enter your age:</label>
                            <input type="text" class="form-control" id="uage" name="age" placeholder="Enter your age"  title="Six or more characters" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select gender:</label>
                            <select class="form-control" id="sel1" name="sex">
                                <option value="_3">Male</option>
                                <option value="_4">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="location" class="label_font">Enter your Location:</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter your location"  title="Six or more characters" required>
                        </div>



                        <div class="form-group">
                            <label for="email" class="label_font">Email:</label>
                            <input type="email" class="form-control" id="uemail" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd" class="label_font">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                        </div>
                        <div class="form-group">
                            <label for="rep_pwd" class="label_font">Confirm Password:</label>
                            <input type="password" class="form-control" id="rep_pwd" name="psw-repeat" required>
                        </div>
                        <p id="validate-status" ></p>
                    </div>
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> <input type="checkbox" id="checkme"/>

                    <div class="clearfix">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn" id="enableme"  disabled="disabled">Sign Up</button>
                    </div>
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

